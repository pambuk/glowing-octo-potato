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
    Route::get('operations/delete/{operation}', 'OperationsController@destroy')->name('operations.destroy');

//    Route::get('operation-items/{operation}', 'OperationItemsController@index')->name('operation-items.index');
    Route::get('operation-items/{operation}/index', 'OperationItemsController@index')->name('operation-items.index');
    Route::post('operation-items/{operation}/store', 'OperationItemsController@store')->name('operation-items.store');
    Route::get('operation-items/{operation}/delete/{item}',
        'OperationItemsController@destroy')->name('operation-items.destroy');
    Route::get('operation-item/{operation}/edit/{item}', 'OperationItemsController@edit')->name('operation-items.edit');
    Route::put('operation-item/{operation}/edit/{item}', 'OperationItemsController@update')->name('operation-items.update');
});
