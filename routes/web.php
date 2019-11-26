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

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    
    Route::resource('/', 'AdminController');

    Route::resource('barang', 'ItemController');

    Route::resource('kategori', 'CategoryController');

    Route::resource('pegawai', 'EmployeeController');

    Route::resource('pelanggan', 'ClientController');

    Route::resource('bio', 'BioController');

});

    Route::resource('barang', 'ItemController')->middleware('auth');

    Route::resource('kategori', 'CategoryController')->middleware('auth');

    Route::resource('pegawai', 'EmployeeController')->middleware('auth');

    Route::resource('pelanggan', 'ClientController')->middleware('auth');
    
    Route::resource('bio', 'BioController')->middleware('auth');

    //edit
Route::post('barang/update/{id}', 'ItemController@update')->name('updateBarang');
Route::post('ketagori/update/{id}', 'CategoryController@update')->name('updateKategori');
Route::post('pegawai/update/{id}', 'EmployeeController@update')->name('updatePegawai');
Route::post('pelanggan/update/{id}', 'ClientController@update')->name('updatePelanggan');





//delete
Route::delete('barang/delete/{id}', 'ItemController@destroy');
Route::delete('kategori/delete/{id}', 'CategoryController@destroy');
Route::delete('pegawai/delete/{id}', 'EmployeeController@destroy');
Route::delete('pelanggan/delete/{id}', 'ClientController@destroy');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('data-member', 'BookingController@listMember')->middleware('auth');

//booking
Route::get('booking', ['as' => 'booking.index', 'uses' => 'BookingController@index'])->middleware('auth');

Route::post('create-client', ['as' => 'createClient', 'uses' => 'BookingController@createClient'])->middleware('auth');

Route::post('booking/details', ['as' => 'booking.calculate', 'uses' => 'BookingController@calculate'])->middleware('auth');

Route::post('booking/process', ['as' => 'booking.process', 'uses' => 'BookingController@process'])->middleware('auth');

//pengembalian

Route::get('pengembalian', ['as' => 'pengembalian.index', 'uses' => 'ReturnController@index'])->middleware('auth');

Route::get('pengembalian/informasi', ['as' => 'pengembalian.information', 'uses' => 'ReturnController@information'])->middleware('auth');

Route::post('pengembalian/proses', ['as' => 'pengembalian.process', 'uses' => 'ReturnController@process'])->middleware('auth');

//report

Route::get('riwayat/transaksi', 'ReportController@index')->name('laporan')->middleware('auth');


