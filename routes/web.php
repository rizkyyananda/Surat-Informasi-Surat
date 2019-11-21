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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::resource('user', 'UserController');
Route::resource('disposisi', 'DisposisiController');
Route::resource('suratmasuk', 'SuratMasukController');
Route::resource('suratkeluar', 'SuratKeluarController');
Route::get('/unduh/{id}', 'SuratKeluarController@unduh');


