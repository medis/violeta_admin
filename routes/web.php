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

// Route::get('shows/create', 'ShowsController@create')->name('show.create');;
// Route::get('show/{show}/edit', 'ShowsController@edit')->name('show.edit');

// Route::post('shows/create', 'ShowsController@store')->name('show.store');
// Route::post('show/{show}/edit', 'ShowsController@update')->name('show.update');

// Route::delete('show/{show}/delete', 'ShowsController@destroy')->name('show.destroy');