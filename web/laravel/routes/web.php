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

// authentification needed
Route::group(['middleware' => 'auth' ], function(){

    // load db from cerebii html files
    Route::group(['as' => 'MPdbloader::'], function (){
        Route::get('/mpdbloader', ['as' => 'index', 'uses' => 'MPdbloaderController@index']);
		Route::get('/mpdbloader/cerebii', ['as' => 'cerebii', 'uses' => 'MPdbloaderController@cerebii']);
		Route::get('/mpdbloader/cerebii/img', ['as' => 'cerebiiImg', 'uses' => 'MPdbloaderController@cerebiiImg']);
        Route::get('/mpdbloader/cerebii/html', ['as' => 'cerebiiHtml', 'uses' => 'MPdbloaderController@cerebiiHtml']);
        Route::get('/mpdbloader/load', ['as' => 'load', 'uses' => 'MPdbloaderController@load']);
        Route::get('/mpdbloader/loadConfirm', ['as' => 'loadConfirm', 'uses' => 'MPdbloaderController@loadConfirm']);
	});

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
