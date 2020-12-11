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
    Route::get('/role', 'SystemController@role')->name('laravel.system.role');
    Route::get('/role-set', 'SystemController@roleSet')->name('laravel.system.role-set');
    Route::get('/log', 'SystemController@log')->name('laravel.system.log');
});
