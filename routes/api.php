<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('shows', 'Api\ShowsApiController@index')->name('api.shows.index');
Route::get('press', 'Api\BlogsApiController@index')->name('api.blog.index');
Route::get('music', 'Api\MusicApiController@index')->name('api.music.index');
Route::get('texts', 'Api\TextsApiController@index')->name('api.texts.index');
