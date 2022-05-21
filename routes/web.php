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
Route::get('landing','EssentianController@GoToLanding');
Route::get('login', 'EssentianController@GoToLogin');
Route::get('logout', 'EssentianController@GoTologout');
Route::get('dologin', 'EssentianController@DoLogin');
Route::get('register', 'EssentianController@GoToRegister');
Route::post('doregister', 'EssentianController@DoRegister');
Route::get('dependantkategori/{id}', 'EssentianController@storeKategori');
Route::get('dependantguru/{id}', 'EssentianController@storeGuru');
Route::get('profile', 'EssentianController@GoToProfile');
Route::post('updateprofile', 'EssentianController@DoUpdateProfile');
Route::post('updatepassword', 'EssentianController@UpdatePassword');
// Route::get('image-cropper','EssentianController@index');
// Route::post('image-cropper/upload','EssentianController@upload');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@GoToAdmin');
    Route::get('/kelas', 'AdminController@GoToPembuatanDanPenetapanKelas');
    Route::get('/pelajaran', 'AdminController@GoToPelajaranKelas');
    Route::get('/kategori', 'AdminController@GoToKategoriKelas');
    Route::post('/tambahpelajaran', 'AdminController@DoTambahPelajaran');
    Route::post('/{id}/updatepelajaran', 'AdminController@DoUpdatePelajaran');
    Route::get('/{id}/deletepelajaran','AdminController@DoDeletePelajaran');
    Route::post('/tambahkategori', 'AdminController@DoTambahKategori');
    Route::post('/{id}/updatekategori', 'AdminController@DoUpdateKategori');
    Route::get('/{id}/deletekategori','AdminController@DoDeleteKategori');
    Route::get('/kelas/buatkelas', 'AdminController@GoToBuatKelas');
    Route::get('/kelas/{id}', 'AdminController@GoDetailKelas');
    Route::get('/kelas/{id}/penetapan', 'AdminController@GoPenetapanKelas');
    Route::get('/kelas/{id}/penetapan/{idpendaftaran}', 'AdminController@GoPenetapanKelasmurid');
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
    Route::get('/murid/{id}', 'AdminController@GoToDetailPenerimaanMurid');
    Route::get('/murid/{id}/confirm', 'AdminController@ConfirmDetailPenerimaanMurid');
    Route::get('/murid/{id}/decline', 'AdminController@DeclineDetailPenerimaanMurid');
    Route::get('/transaksi', 'AdminController@GoToLaporanTransaksi');
    Route::get('download/{id}','AdminController@downloadfileCV');
    Route::get('searchPelajaran','AdminController@DoSearchPelajaran');
    Route::get('searchKelas','AdminController@DoSearchKelas');
});
Route::prefix('murid')->group(function () {
    Route::get('/', 'MuridController@GotoHome');
    Route::get('/notifikasi', 'MuridController@GotoNotifikasi');
    Route::get('/pembayaran', 'MuridController@GotoPembayaransemua');
    Route::get('/pembayaran/{tipe}', 'MuridController@GotoPembayaransearch');
    Route::get('/pembayaranbelum', 'MuridController@GotoPembayaranbelum');
    Route::get('/pembayaranmenunggu', 'MuridController@GotoPembayaranmenunggu');
    Route::get('/pembayaransukses', 'MuridController@GotoPembayaransukes');
    Route::get('/pembayarangagal', 'MuridController@GotoPembayarangagal');
    Route::get('/detailpembayaran/{id}', 'MuridController@GotoDetailPembayaran');
    Route::post('/dokirimbuktitf/{id}', 'MuridController@Gokirimbuktitfd');
    Route::post('/dodaftarmurid', 'MuridController@GodaftarMurid');
    Route::get('/todo', 'MuridController@GoToDo');
    Route::get('/kelas', 'MuridController@GoToKelas');
    Route::get('/kelas/{id}', 'MuridController@GoDetailKelas');
    Route::get('/kelas/{id}/member', 'MuridController@GoDetailMemberKelas');
    Route::get('/kelas/{id}/tugas', 'MuridController@GoTugasKelas');
    Route::get('/kelas/{id}/tugas/{id_tugas}', 'MuridController@GoDetailTugasKelas');
    Route::post('kelas/{id}/tugas/uploadtugas', 'MuridController@doUploadTugas');
    Route::get('/kelas/{id}/absensi', 'MuridController@GoAbsensiKelas');
    Route::get('/logout', 'MuridController@GotoHome');
    Route::get('downloadbuktitf/{id}','MuridController@downloadfilebuktitf');
    Route::post('/kelas/comment/{feed_id}/add', 'MuridController@doAddComment');
    Route::post('/kelas/reply/{comment_id}/add', 'GuruController@doAddReply');
    Route::get('downloadlampiranfeed/{id}','MuridController@downloadlampiranfeed');
    Route::get('downloadlampirantugas/{id}','MuridController@downloadlampirantugas');

});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@GotoHome');
    Route::get('/notifikasi', 'GuruController@GotoNotifikasi');
    Route::get('/kelas', 'GuruController@GoToKelas');
    Route::get('/kelas/{id}', 'GuruController@GoDetailKelas');
    Route::get('/kelas/{id}/tugas', 'GuruController@GoTugasKelas');
    Route::get('/kelas/{id}/tugas/{id_tugas}', 'GuruController@GoDetailTugasKelas');
    Route::post('/kelas/{id}/tugas/add', 'GuruController@doAddTugasKelas');
    Route::post('/kelas/{idtugas}/updatetugas', 'GuruController@doUpdateTugasKelas');
    Route::GET('/kelas/{id}/{idtugas}/deletetugas', 'GuruController@doDeleteTugas');
    Route::get('/kelas/{id}/absensi', 'GuruController@GoAbsensiKelas');
    Route::post('/kelas/{id}/absensi/update', 'GuruController@DoAbsensiKelas');
    Route::get('/kelas/{id}/member', 'GuruController@GoDetailMemberKelas');
    Route::post('/kelas/{id}/addfeed', 'GuruController@doAddFeed');
    Route::post('/kelas/{idfeed}/updatefeed', 'GuruController@doUpdateFeed');
    Route::GET('/kelas/{idfeed}/deletefeed', 'GuruController@doDeleteFeed');
    Route::post('/kelas/comment/{feed_id}/add', 'GuruController@doAddComment');
    Route::post('/kelas/reply/{comment_id}/add', 'GuruController@doAddReply');
    Route::get('/penilaian', 'GuruController@GoToPenilaian');
    Route::get('/penilaian/{idkelas}', 'GuruController@GoToTugasPenilaian');
    Route::get('/penilaian/{idkelas}/{idtugas}', 'GuruController@GoToTugasPenilaian');
    Route::post('/kelas/{idkelas}/tugas/{idtugas}/simpan', 'GuruController@DoSimpanNilai');
    Route::get('downloadlampiranfeed/{id}','GuruController@downloadlampiranfeed');
    Route::get('downloadlampirantugas/{id}','GuruController@downloadlampirantugas');

});
Route::get('download/{id}/{namafile}','EssentianController@downloadfile');
Route::get('downloadall/{id}/{id_tugas}','EssentianController@downloadallfile');
