<?php

//web中间件从laravel 5.2.27版本以后默认全局加载，不需要自己手动载入，
//如果自己手动重复载入，会导致session无法加载的情况  博客框架版本：Laravel Framework version 5.2.45


Route::get('/', function () {
        return view('welcome');
    });

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');



Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');


    Route::post('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category', 'CategoryController');//资源路由 分类

    Route::resource('article', 'ArticleController');//资源路由 文章

    Route::post('links/changeorder', 'LinksController@changeOrder');
    Route::resource('links', 'LinksController');//资源路由 友情链接

    Route::post('navs/changeorder', 'NavsController@changeOrder');
    Route::resource('navs', 'NavsController');//资源路由 自定义导航



    Route::any('upload', 'CommonController@upload'); //缩略图 文件上传

    Route::match(['get','post'],'pass', 'IndexController@pass');//密码更改
});
