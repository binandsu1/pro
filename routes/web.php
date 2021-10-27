<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\YqController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|->middleware('auth')
*/
Route::get('/yan', [YqController::class,'y'])->name('yan');
Route::get('/', function () {
    return redirect(route('admin'));
})->middleware('auth');
