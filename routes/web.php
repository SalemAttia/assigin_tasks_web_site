<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'taskmanager@tasks');
Route::get('/task/{id}', 'taskmanager@singletask');
Route::get('/task/download/{id}', 'taskmanager@download');
Route::post('/update', 'taskmanager@update');
Route::post('/addnewtask', 'taskmanager@addnewtask');
Route::post('/addnewuser', 'taskmanager@addnewuser');

Auth::routes();

Route::get('/home', 'HomeController@index');
