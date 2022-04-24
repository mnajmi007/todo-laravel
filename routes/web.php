<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', 'App\Http\Controllers\TodoController@index');

Route::post('/add-activity', 'App\Http\Controllers\TodoController@addActivity');
Route::post('/check-activity/{id}', 'App\Http\Controllers\TodoController@checkActivity');
Route::post('/uncheck-activity/{id}', 'App\Http\Controllers\TodoController@unCheckActivity');
