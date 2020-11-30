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

Route::prefix('laravel')->group(function() {
    Route::get('/index', 'LaravelController@index')->name('admin.laravel.index');
    Route::get('/artisan', 'LaravelController@artisan')->name('admin.laravel.artisan');
    Route::get('/artisan-info', 'LaravelController@artisanInfo')->name('admin.laravel.artisan-info');
    Route::match(['get','post'],'/artisan-add', 'LaravelController@artisanAdd')->name('admin.laravel.artisan-add');
    Route::match(['get','post'],'/artisan-del', 'LaravelController@artisanDel')->name('admin.laravel.artisan-del');
    Route::match(['get','post'],'/artisan-sel', 'LaravelController@artisanSel')->name('admin.laravel.artisan-sel');
    Route::get('/user', 'LaravelController@user')->name('admin.laravel.user');
    Route::get('/queue', 'LaravelController@queue')->name('admin.laravel.queue');
});
