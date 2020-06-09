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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/web/index','TaskController@index');
Route::post('/web/storeToTaskController','TaskController@store')->name('store');
//Route::post('/web/task/{id}','TaskController@show');
Route::resource('/web/index', 'TaskController');
Route::delete('/web/index/delete/{id}','TaskController@destroy');
Route::get('/web/create','TaskController@create');
Route::put('/web/edit/{id}','TaskController@edit');
Route::patch('/web/update/{id}','TaskController@update');
