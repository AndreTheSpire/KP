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
Route::get('login', 'EssentianController@GoToLogin');
Route::get('dologin', 'EssentianController@DoLogin');
Route::get('register', 'EssentianController@GoToRegister');
Route::post('doregister', 'EssentianController@DoRegister');
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@GoToAdmin');
    Route::get('/kelas', 'AdminController@GoToPembuatanDanPenetapanKelas');
    Route::get('/guru', 'AdminController@GoToPenerimaanGuru');
    Route::get('/detailguru', 'AdminController@GoToDetailPenerimaanGuru');
    Route::get('/murid', 'AdminController@GoToPenerimaanMurid');
    Route::get('/transaksi', 'AdminController@GoToLaporanTransaksi');
});
Route::prefix('murid')->group(function () {
    Route::get('/', 'MuridController@GotoHome');

});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@GotoHome');

});
