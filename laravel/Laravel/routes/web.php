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

Route::get('helo', 'HeloController@index');
Route::post('helo', 'HeloController@postIndex');

Route::get('helo/new', 'HeloController@getNew');
Route::post('helo/new', 'HeloController@postNew');

Route::get('helo/update', 'HeloController@getUpdate');
Route::post('helo/update', 'HeloController@postUpdate');

Route::get('helo/delete', 'HeloController@getDelete');

Route::get('blade', function(){
	return view('child');
});

Route::get('alert', function(){
	return view('alert');
});
