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

Route::get('/login','AuthController@login')->name('login');
Route::post('/post-login','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:Admin']], function() {
	Route::get('/laporan', 'LaporanController@index');
	Route::get('/export-excel', 'LaporanController@exportExcel');
	Route::get('/export-pdf', 'LaporanController@exportPdf');
});

Route::group(['middleware' => ['auth','checkRole:Admin,Operator']], function() {
	Route::get('/dashboard','DashboardController@index');
	// Barang
	Route::get('/data-barang','BarangController@index');
	Route::get('/add-barang','BarangController@create');
	Route::post('/add-barang','BarangController@store');
	Route::get('/barang/{id}/edit','BarangController@edit');
	Route::post('/barang/{id}/update','BarangController@update');
	Route::get('/barang/{id}/hapus','BarangController@destroy');
	Route::get('/search-barang','BarangController@search');
	Route::get('/barang/id/edit','BarangController@edit');
	Route::get('/search-barang','BarangController@search');
	// Penjualan
	Route::get('/data-penjualan','PenjualanController@index');
	Route::get('/add-penjualan','PenjualanController@create');
	Route::post('/add-penjualan','PenjualanController@store');
	Route::get('/search-penjualan','PenjualanController@search');
	// Pengguna
	Route::get('/data-pengguna','PenggunaController@index');
	Route::get('/add-pengguna','PenggunaController@create');
	Route::post('/add-pengguna','PenggunaController@store');
	Route::get('/pengguna/{id}/edit','PenggunaController@edit');
	Route::post('/pengguna/{id}/edit','PenggunaController@update');
	Route::get('/edit/{id}/password','PenggunaController@editpassword');
	Route::post('/password/{id}/update','PenggunaController@updatepassword');
	Route::get('/pengguna/{id}/hapus','PenggunaController@destroy');
	Route::get('/search-pengguna','PenggunaController@search');
});