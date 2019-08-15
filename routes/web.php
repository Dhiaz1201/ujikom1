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
Route::group(['prefix' => 'backend','middleware' =>['auth','role:admin']], function () {
    Route::get('/', function () {
    return view("home");
    });
      Route::resource('peminjam', 'PeminjamController');
       Route::resource('petugas', 'PetugasController');
        Route::resource('penerbit', 'PenerbitController');
         Route::resource('kategori', 'KategoriController');
          Route::resource('peminjaman', 'PeminjamanController');
       Route::resource('kartupendaftaran', 'KartupendaftaranController');
        Route::resource('buku', 'BukuController');
         Route::resource('detailpinjam', 'DetailpinjamController');
     Route::resource('user','UserController');
});
Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
