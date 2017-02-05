<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'news'], function($route){
    $route->get('create', ['uses' => 'ArticleController@create', 'as' => 'news.create']);
    $route->post('create', ['uses' => 'ArticleController@store', 'as' => 'news.store']);
    $route->get('/', ['uses' => 'ArticleController@index', 'as' => 'news.index']);
    $route->get('/{article}', ['uses' => 'ArticleController@view', 'as' => 'news.view']);
    $route->get('/{article}/edit', ['uses' => 'ArticleController@edit', 'as' => 'news.edit']);
    $route->put('/{article}/update', ['uses' => 'ArticleController@update', 'as' => 'news.update']);
    $route->post('{article}/add-comment', ['uses' => 'ArticleController@addComment', 'as' => 'news.comment']);
});

Auth::routes();