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

Route::prefix('system')->group(function() {
    Route::get('/admin', 'SystemController@admin')->name('laravel.system.admin');
    Route::get('/admin-add-role', 'SystemController@adminAddRole')->name('laravel.system.admin-add-role');
    Route::get('/role', 'SystemController@role')->name('laravel.system.role');
    Route::get('/role-set', 'SystemController@roleSet')->name('laravel.system.role-set');
    Route::get('/role-del', 'SystemController@roleDel')->name('laravel.system.role-del');
    Route::get('/role-up', 'SystemController@roleUpStatus')->name('laravel.system.role-up');
    Route::get('/role-change', 'SystemController@roleChange')->name('laravel.system.role-change');
    Route::match(['get','post'],'/role-save', 'SystemController@roleSave')->name('laravel.system.role-save');
    Route::match(['get','post'],'/role-add', 'SystemController@roleAdd')->name('laravel.system.role-add');
    Route::match(['get','post'],'/role-sel', 'SystemController@roleSel')->name('laravel.system.role-sel');
    Route::match(['get','post'],'/role-laod', 'SystemController@roleLaod')->name('laravel.system.role-laod');
    Route::get('/log', 'SystemController@log')->name('laravel.system.log');
    Route::get('/log-sel', 'SystemController@logSel')->name('laravel.system.log-sel');
    Route::get('/prohibit', 'SystemController@prohibit')->name('laravel.system.prohibit');
    Route::get('/money', 'SystemController@money')->name('laravel.system.money');
});
