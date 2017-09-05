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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('operations', 'OperationsController@index')->name('operations.index');
    Route::get('operations/create', 'OperationsController@create')->name('operations.create');
    Route::post('operations/create', 'OperationsController@store')->name('operations.store');
    Route::get('operations/show/{operation}', 'OperationsController@show')->name('operations.show');
    Route::put('operations/update/{operation}', 'OperationsController@update')->name('operations.update');
});
