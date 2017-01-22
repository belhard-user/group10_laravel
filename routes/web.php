<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'db'], function($r){
    $r->get('insert', 'DBController@insert');
    $r->get('update', 'DBController@update');
    $r->get('select', 'DBController@select');
    $r->get('delete', 'DBController@delete');
    $r->get('create-record', 'DBController@showForm');
    $r->post('create-record', 'DBController@storeForm');
});

Auth::routes();