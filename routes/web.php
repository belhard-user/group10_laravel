<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome/{name?}', 'HomeController@index');

Route::get('hello-{name}-{age}', 'HomeController@hello')->where([
    'name' => '[a-z]+',
    'age' => '\d{1,2}'
]);


Route::group(['prefix' => 'tag', 'namespace' => 'Article'], function(){
    Route::get('article', ['uses' => 'ArticleController@index', 'as' => 'article']);
});


Route::group(['prefix' => 'secure'], function($r){
    $r->get('dashboard', function(){
        return "admin/dashbord";
    });

    $r->get('users', function(){
        return "admin/users";
    });

    Route::get('article', function(){
        return "admin/article";
    });
});
