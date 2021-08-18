<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('curd')->group(function() {
    Route::get('/sw', 'CurdController@sw')->name('admin.curd.swool');
    Route::get('/demo1', 'CurdController@demo1')->name('admin.curd.demo1');
    Route::get('/demo2', 'CurdController@demo2')->name('admin.curd.demo2');
    Route::match(['GET','POST'],'/demo-add', 'CurdController@demoAdd')->name('admin.curd.demo-add');
    Route::match(['GET','POST'],'/demo-del', 'CurdController@demoDel')->name('admin.curd.demo-del');
    Route::match(['GET','POST'],'/demo-sel', 'CurdController@demoSel')->name('admin.curd.demo-sel');
    Route::get('/button', 'CurdController@button')->name('admin.curd.button');
    Route::get('/rq', 'CurdController@rq')->name('admin.curd.rq');
});
