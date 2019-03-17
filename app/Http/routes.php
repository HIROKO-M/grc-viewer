<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// GRC View側
Route::get('/', 'AllkeysController@index');
Route::post('/', 'AllkeysController@index');
Route::get('/', 'AllkeysController@allkeys');
Route::resource('/', 'AllkeysController@index');


Route::get('pickupkeys', 'PickupkeysController@index');
Route::post('pickupkeys', 'PickupkeysController@pickupkeys');
Route::resource('pickupkeys', 'PickupkeysController@index');



// CSVインポート側

Route::get('showImportCSV', 'GdatasController@showImportCSV')->name('gdatas.showImportCSV');
Route::post('showImportCSV', 'GdatasController@importCSV');

