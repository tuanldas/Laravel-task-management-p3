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
Route::group(['middleware' => ['auth']], function () {

    Route::match(['get', 'post'], '/', 'TaskController@index')->name('index');

    Route::get('/update/{id}', 'TaskController@create')->name('update');

    Route::post('/updateData/{id}', 'TaskController@update')->name('updateData');

    Route::get('/ínsert/{id}', 'TaskController@create')->name('insert');

    Route::post('insertData', 'TaskController@edit')->name('edit');

    Route::get('delete/{id}', 'TaskController@destroy')->name('delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
