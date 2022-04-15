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

Route::get('/','EssentianController@GoToLogin');
Route::get('login', 'EssentianController@GoToLogin');
Route::get('logout', 'EssentianController@GoTologout');
Route::get('dologin', 'EssentianController@DoLogin');
Route::get('register', 'EssentianController@GoToRegister');
Route::post('doregister', 'EssentianController@DoRegister');
Route::get('dependantkategori/{id}', 'EssentianController@storeKategori');
Route::get('dependantguru/{id}', 'EssentianController@storeGuru');


Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@GoToAdmin');
    Route::get('/kelas', 'AdminController@GoToPembuatanDanPenetapanKelas');
    Route::get('/pelajaran', 'AdminController@GoToPelajaranKelas');
    Route::get('/kategori', 'AdminController@GoToKategoriKelas');
    Route::post('/tambahpelajaran', 'AdminController@DoTambahPelajaran');
    Route::get('/{id}/deletepelajaran','AdminController@DoDeletePelajaran');
    Route::post('/tambahkategori', 'AdminController@DoTambahKategori');
    Route::get('/{id}/deletekategori','AdminController@DoDeleteKategori');
    Route::get('/kelas/buatkelas', 'AdminController@GoToBuatKelas');
    Route::get('/kelas/{id}', 'AdminController@GoDetailKelas');
    Route::post('/kelas/doupdatekelas', 'AdminController@DoUpdatekelas');
    Route::post('/kelas/dobuatkelas', 'AdminController@DoBuatKelas');
    Route::get('/guruCV', 'AdminController@GoToPenerimaanCVGuru');
    Route::get('/guruWawancara', 'AdminController@GoToPenerimaanWawancaraGuru');
    Route::get('/detailcvguru/{id}', 'AdminController@GoToDetailPenerimaanCVGuru');
    Route::get('/detailcvguru/{id}/confirm', 'AdminController@ConfirmCVGuru');
    Route::get('/detailcvguru/{id}/decline', 'AdminController@DeclineCVGuru');
    Route::get('/detailwawancaraguru/{id}', 'AdminController@GoToDetailPenerimaanWawancaraGuru');
    Route::get('/detailwawancaraguru/{id}/confirm', 'AdminController@ConfirmWawancaraGuru');
    Route::get('/detailwawancaraguru/{id}/decline', 'AdminController@DeclineWawancaraGuru');
    Route::get('/murid', 'AdminController@GoToPenerimaanMurid');
    Route::get('/transaksi', 'AdminController@GoToLaporanTransaksi');
    Route::get('download/{id}','AdminController@downloadfileCV');
});
Route::prefix('murid')->group(function () {
    Route::get('/', 'MuridController@GotoHome');
    Route::get('/pembayaran', 'MuridController@GotoPembayaran');
    Route::get('/detailpembayaran/{id}', 'MuridController@GotoDetailPembayaran');
    Route::post('/dodaftarmurid', 'MuridController@GodaftarMurid');
    Route::get('/logout', 'MuridController@GotoHome');

});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@GotoHome');

});
