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

Route::get('/',      'HomeController@index')->name('home');
Route::get('/home',  'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/fetchNYTimes',  'NYTimesFetchController@index');
    Route::get('/updates',       'OtherController@updates');
    Route::get('/passport',      'OtherController@passport');
    Route::get('/api_calls',     'OtherController@api_calls');
    Route::get('/testcases',     'OtherController@testcases');
    Route::get('/stackoverflow', 'OtherController@stackoverflow');
    Route::get('/github',        'OtherController@github');
    Route::get('/disclaimer',    'OtherController@disclaimer');
});



