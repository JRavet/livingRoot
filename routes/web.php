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

Route::pattern('resource_id', "[0-9]+");

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware'=>['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix' => '/contentWriter'], function() {
        Route::get('/{resource_id}', 'ContentWriter@index')->name('contentWriter');
        Route::post('/save/{resource_id}', 'ContentWriter@save')->name('contentWriterSave');
        Route::post('/load/{resource_id}', 'ContentWriter@load')->name('contentWriterLoad');
    });
});