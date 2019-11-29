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

Route::get('/', 'FeedController@list')->name('feed_list');
Route::group(['prefix' => 'feeds'], function () {
    Route::get('/{feedId}', 'FeedController@show')->name('feed_show');
    Route::post('/create', 'FeedController@create')->name('feed_create');
    Route::post('/delete', 'FeedController@delete')->name('feed_delete');
});