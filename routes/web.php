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

Route::get('/', 'PhotoController@index')->name('photo.index');
Route::get('photos/load', 'PhotoController@loadImages')->name('photo.loadImages');

Route::group([
    'prefix' => 'tags'
], function () {
    Route::post('/create', 'TagController@store')->name('tag.store');
});

Route::group([
    'prefix' => 'photos',
    'middleware' => 'auth'
], function () {
    Route::get('/create', 'PhotoController@create')->name('photo.create');
    Route::post('/create', 'PhotoController@store')->name('photo.store');
});