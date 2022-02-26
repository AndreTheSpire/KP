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
Route::get('/login', 'EssentianController@GoToLogin');
Route::get('register', 'EssentianController@GoToRegister');
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@GoToAdmin');
    Route::get('/kelas', 'AdminController@GoToPembuatanDanPenetapanKelas');
    Route::get('/guru', 'AdminController@GoToPenerimaanGuru');
    Route::get('/murid', 'AdminController@GoToPenerimaanMurid');
    Route::get('/transaksi', 'AdminController@GoToLaporanTransaksi');
});
