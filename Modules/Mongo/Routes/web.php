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

Route::prefix('mongo')->group(function() {
    Route::get('/index', 'MongoController@index')->name('admin.mongo.index');
    Route::get('/list', 'MongoController@list')->name('admin.mongo.list');
});
