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

Route::prefix('es')->group(function() {
    Route::get('/', 'EsController@index')->name('laravel.es.index');
    Route::get('/curd', 'EsController@curd')->name('laravel.es.curd');
    Route::get('/index-list', 'EsController@indexList')->name('laravel.es.index-list');
    Route::get('/index-add', 'EsController@indexAdd')->name('laravel.es.index-add');
    Route::get('/index-del', 'EsController@indexDel')->name('laravel.es.index-del');
    Route::get('/document-del', 'EsController@documentDel')->name('laravel.es.document-del');
    Route::get('/document-index', 'EsController@documentIndex')->name('laravel.es.document-index');
    Route::match(['get','post'],'/document-add', 'EsController@documentAdd')->name('laravel.es.document-add');
});
