<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'news'], function($route){
    $route->get('create', ['uses' => 'ArticleController@create', 'as' => 'news.create']);
    $route->post('create', ['uses' => 'ArticleController@store', 'as' => 'news.store']);
});

Auth::routes();