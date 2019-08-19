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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/curl','user\UserController@curl');
Route::get('/reg',"user\UserController@reg");
Route::post('/reg_do',"user\UserController@reg_do");

Route::get('/reg',"user\UserController@reg");
