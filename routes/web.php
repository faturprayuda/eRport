<?php

use Illuminate\Support\Facades\Route;

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

// siswa
Route::get('/list-siswa', 'SiswaController@index')->middleware('auth')->name('index-siswa');
Route::get('/tambah-siswa', 'SiswaController@create')->middleware('auth')->name('tambah-siswa');
Route::post('/simpan-siswa', 'SiswaController@store')->middleware('auth')->name('simpan-siswa');
Route::get('/edit-siswa/{id}', 'SiswaController@edit')->middleware('auth')->name('edit-siswa');
Route::post('/ubah-siswa', 'SiswaController@update')->middleware('auth')->name('ubah-siswa');
Route::get('/hapus-siswa/{id}', 'SiswaController@destroy')->middleware('auth')->name('hapus-siswa');

// pelajaran
Route::get('/list-pelajaran', 'PelajaranController@index')->middleware('auth')->name('index-pelajaran');
Route::get('/tambah-pelajaran', 'PelajaranController@create')->middleware('auth')->name('tambah-pelajaran');
Route::post('/simpan-pelajaran', 'PelajaranController@store')->middleware('auth')->name('simpan-pelajaran');
Route::get('/edit-pelajaran/{id}', 'PelajaranController@edit')->middleware('auth')->name('edit-pelajaran');
Route::post('/ubah-pelajaran', 'PelajaranController@update')->middleware('auth')->name('ubah-pelajaran');
Route::get('/hapus-pelajaran/{id}', 'PelajaranController@destroy')->middleware('auth')->name('hapus-pelajaran');

// eraport
Route::get('index-raport', 'RaportController@index')->middleware('auth')->name('index-raport');
Route::get('tambah-raport', 'RaportController@create')->middleware('auth')->name('tambah-raport');
Route::post('simpan-raport-siswa', 'RaportController@store')->middleware('auth')->name('simpan-raport-siswa');
Route::get('detail-raport/{id}', 'RaportController@show')->middleware('auth')->name('detail-raport');
Route::get('edit-raport/{id}', 'RaportController@edit')->middleware('auth')->name('edit-raport');
Route::get('ubah-raport/{id}', 'RaportController@showEdit')->middleware('auth')->name('ubah-raport');
Route::post('update-raport', 'RaportController@update')->middleware('auth')->name('update-raport');
Route::get('hapus-raport/{id}', 'RaportController@destroy')->middleware('auth')->name('hapus-raport');
