<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    protected $fillable = [
        'title',
        'descriptionPersian',
        'descriptionEnglish',
        'hozehTahtPoshesh',
        'mehvarKongreh',
        'mehvarKonfrance',
        'mehvarHamayesh',
        'bargozarKonandegan',
        'sayerBargozarKonandegan',
        'shahrBargozary',
        'vazyiatKonfrance',
        'etelaatTamas',
        'telphoneDabirkhaneh',
        'faxDabirkhaneh',
        'addressPostiDabirkhaneh',
        'email',
        'website',
        'sazmanConfrance',
        'logoBargozarKonandeh',
        'logoKonfrance',
        'link',
        'tarikhMohem',
        'tarikhBargozari',
        'mohlatErsalChekideh',
        'mohlatErsalAslMagalat',
        'tarikhElamDavariMagalat',
        'mohlatSabtnamDarKonfrance',
    ];
}
