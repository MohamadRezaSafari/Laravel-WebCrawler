<?php

namespace App\Http\Controllers;

use App\Excel;
use Illuminate\Http\Request;
use App\Bundle;
use Illuminate\Support\Facades\DB;

class RobotController extends Controller
{
    protected $uri = "https://www.civilica.com/modules.php?name=ConfCalendar&op=SearchResult";
    protected $uriPaginateStart = "https://www.civilica.com/Calendar----";
    protected $uriPaginateEnd = "-2-DESC-AI-.html";
    protected $baseUri = "https://www.civilica.com/";


    public function index($start = null, $end = null, Bundle\Robot $robot)
    {
        $data = array();

        if (isset($start) && isset($end))
        {
            $URL = $this->uriPaginateStart . $start . "-" . $end . $this->uriPaginateEnd;
            $links = $robot->LinkHref($URL);
            $pages = explode("@@@", $links);
            foreach($pages as $key => $page)
            {
                if ($key == 0)
                    $data[0] = array(
                        //'ردیف',
                        'عنوان همایش',
                        'توضیحات فارسی',
                        'توضیحات لاتین',
                        'حوزه های تحت پوشش',
                        'محورهای کنگره',
                        'محور های کنفرانس',
                        'محورهای همایش',
                        'برگزارکنندگان',
                        'سایر برگزار کنندگان',
                        'شهر برگزاری',
                        'وضعیت کنفرانس',
                        'اطلاعات تماس',
                        'تلفن دبیرخانه',
                        'فکس دبیرخانه',
                        'آدرس پستی دبیرخانه',
                        'ایمیل',
                        'وبسایت',
                        'سازمان کنفرانس',
                        'لوگو برگزارکننده',
                        'لوگو کنفرانس',
                        'لینک صفحه در سیویلیکا',
                        'تاریخهای مهم',
                        'تاریخ برگزاری',
                        'مهلت ارسال چکیده',
                        'مهلت ارسال اصل مقالات',
                        'تاریخ اعلام داوری مقالات',
                        'مهلت ثبت نام در کنفرانس'
                    );
                if (!empty($page) && $key <= count($pages) && $key > 0)
                    $data[$key] = $robot->DownloadDetail($page);
            }
            $robot->Excel($data);
        }
        else
        {
            $links = $robot->LinkHref($this->uri);
            $pages = explode("@@@", $links);
            foreach($pages as $key => $page)
            {
                if ($key == 0)
                    $data[0] = array(
                        //'ردیف',
                        'عنوان همایش',
                        'توضیحات فارسی',
                        'توضیحات لاتین',
                        'حوزه های تحت پوشش',
                        'محورهای کنگره',
                        'محور های کنفرانس',
                        'محورهای همایش',
                        'برگزارکنندگان',
                        'سایر برگزار کنندگان',
                        'شهر برگزاری',
                        'وضعیت کنفرانس',
                        'اطلاعات تماس',
                        'تلفن دبیرخانه',
                        'فکس دبیرخانه',
                        'آدرس پستی دبیرخانه',
                        'ایمیل',
                        'وبسایت',
                        'سازمان کنفرانس',
                        'لوگو برگزارکننده',
                        'لوگو کنفرانس',
                        'لینک صفحه در سیویلیکا',
                        'تاریخهای مهم',
                        'تاریخ برگزاری',
                        'مهلت ارسال چکیده',
                        'مهلت ارسال اصل مقالات',
                        'تاریخ اعلام داوری مقالات',
                        'مهلت ثبت نام در کنفرانس'
                    );
                if (!empty($page) && $key <= count($pages) && $key > 0)
                    $data[$key] = $robot->DownloadDetail($page);
            }
            $robot->Excel($data);
        }

        return view('show', compact('pages'));
    }



    public function excel($name, $url)
    {
        $robot = new Bundle\Robot();
        $data = $robot->DownloadDetail(decrypt($url));
        $robot->AppendExcleRow($name, $data);
    }


}
