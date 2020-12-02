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

Route::get('/', 'AdminController@index')->name('admin');
Route::match(['get', 'post'],'/login', 'AdminController@login')->name('admin.login');
Route::match(['get', 'post'],'/register', 'AdminController@register')->name('admin.register');
Route::match(['get', 'post'],'/search', 'AdminController@searchGlobal')->name('admin.search.global');
Route::match(['get', 'post'],'/logout', 'AdminController@logOut')->name('admin.logout');
Route::match(['get', 'post'],'/menu', 'AdminController@menu')->name('admin.menu');
Route::match(['get', 'post'],'/debug-status', 'AdminController@debugStatus')->name('admin.debug-status');
