<?php


Route::get('/', function () {
    return view('index');
    //return view('robot');
});



Route::get('/robot/{start?}/{end?}', 'RobotController@index')->where('start', '[0-9]+')->where('end', '[0-9]+');
Route::get('/robotAppend/{name}/excel/', 'RobotController@excel');


