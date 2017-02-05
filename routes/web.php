<?php

Route::get('/', 'HomeController@index');


Route::group(['prefix' => 'db'], function($r) {
    $r->get('insert', 'DBController@insert');
    $r->get('update', 'DBController@update');
    $r->get('select', 'DBController@select');
    $r->get('delete', 'DBController@delete');
    $r->get('create-record', 'DBController@showForm');
    $r->post('create-record', 'DBController@storeForm');
    $r->get('edit-record/{id}', 'DBController@editForm');
    $r->put('edit-record/{id}', 'DBController@updateForm');
    $r->get('select-model', 'DBController@selectModel');
    $r->get('relation', 'DBController@relations');
});

Route::group(['prefix' => 'news'], function($route){
    $route->get('create', ['uses' => 'ArticleController@create', 'as' => 'news.create']);
    $route->post('create', ['uses' => 'ArticleController@store', 'as' => 'news.store']);

});

Auth::routes();