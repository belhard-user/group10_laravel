<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'db'], function($r){
    $r->get('insert', 'DBController@insert');
    $r->get('update', 'DBController@update');
    $r->get('select', 'DBController@select');
    $r->get('delete', 'DBController@delete');
});

Auth::routes();