<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\home@index');
Route::get('/detail', 'App\Http\Controllers\home@detail');
Route::get('/category-{name}', 'App\Http\Controllers\home@masterCategory');
Route::get('/cuon-sach/{name}', 'App\Http\Controllers\home@detailsBook');
