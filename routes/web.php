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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('show', 'ShowsController');
Route::resource('blog', 'BlogsController');
Route::resource('music', 'MusicsController');
Route::resource('text', 'TextsController', ['only' => [
  'index', 'edit', 'update'
]]);
Route::resource('radio', 'RadioController', ['except' => ['show']]);