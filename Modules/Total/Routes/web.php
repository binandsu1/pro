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

Route::prefix('total')->group(function() {
    Route::get('/index-z', 'TotalController@index')->name('laravel.total.index');
    Route::get('/total-z', 'TotalController@totalZ')->name('laravel.total.z');
    Route::get('/total-b', 'TotalController@totalB')->name('laravel.total.b');
    Route::get('/total-q', 'TotalController@totalQ')->name('laravel.total.q');
});
