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
/*
Route::get('/', function () {
    return view('home');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('chart','HomeController@chart');

Route::resource('user', 'UserController');
Route::get('/user/hapus/{id}', 'UserController@destroy');

Route::resource('anggota', 'AnggotaController');

Route::resource('buku', 'BukuController');



Route::get('/format_buku', 'BukuController@format');
Route::post('/import_buku', 'BukuController@import');

Route::resource('transaksi', 'TransaksiController');
Route::get('/laporan/trs', 'LaporanController@transaksi');
Route::get('/laporan/trs/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/trs/excel', 'LaporanController@transaksiExcel');

Route::get('/laporan/buku', 'LaporanController@buku');
Route::get('/laporan/buku/pdf', 'LaporanController@bukuPdf');
Route::get('/laporan/buku/excel', 'LaporanController@bukuExcel');



 Route::resource('jabatan', 'JabatanController');
 Route::get('/jabatan/hapus/{id}', 'JabatanController@destroy');

 Route::resource('struktural', 'StrukturalController');
 Route::get('/struktural/hapus/{id}', 'StrukturalController@destroy');

 Route::resource('pangkatGolongan', 'PangkatGolonganController');
 Route::get('/pangkatGolongan/hapus/{id}', 'PangkatGolonganController@destroy');

 Route::resource('pendidikan', 'PendidikanController');
 Route::get('/pendidikan/hapus/{id}', 'PendidikanController@destroy');

 Route::resource('status', 'StatusController');
 Route::get('/status/hapus/{id}', 'StatusController@destroy');

 Route::resource('unitKerja', 'UnitKerjaController');
 Route::get('/unitKerja/hapus/{id}', 'UnitKerjaController@destroy');

 Route::resource('dataPegawai', 'DataPegawaiController');
 Route::resource('printdataPegawai', 'PrintPegawaiController');
 Route::get('/dataPegawai/hapus/{id}', 'DataPegawaiController@destroy');

 Route::resource('keluarga', 'DataKeluargaController');
 Route::get('/keluarga/hapus/{id}', 'DataKeluargaController@destroy');

 Route::resource('anak', 'DataKeluargaAnakController');
 Route::get('/anak/hapus/{id}', 'DataKeluargaAnakController@destroy');

 Route::resource('pasangan', 'DataKeluargaPasanganController');
 Route::get('/pasangan/hapus/{id}', 'DataKeluargaPasanganController@destroy');

 Route::resource('datapendidikan', 'DataPendidikanController');
 Route::get('/datapendidikan/hapus/{id}', 'DataPendidikanController@destroy');
 Route::get('/datapendidikan/editfile/{id}', 'DataPendidikanController@editfile');

 Route::resource('datafungsional', 'DataFungsionalController');
 Route::get('/datafungsional/hapus/{id}', 'DataFungsionalController@destroy');

 Route::resource('datastruktural', 'DataStrukturalController');
 Route::get('/datastruktural/hapus/{id}', 'DataStrukturalController@destroy');

 Route::resource('datapangkat', 'DataPangkatController');
 Route::get('/datapangkat/hapus/{id}', 'DataPangkatController@destroy');

 Route::resource('datadokumen', 'DataDokumenController');
 Route::get('/datadokumen/hapus/{id}', 'DataDokumenController@destroy');

 Route::resource('datajurnal', 'DataJurnalController');
 Route::get('/datajurnal/hapus/{id}', 'DataJurnalController@destroy');

 Route::resource('datakepakaran', 'DataKepakaranController');
 Route::get('/datakepakaran/hapus/{id}', 'DataKepakaranController@destroy');

 Route::resource('datapelatihan', 'DataPelatihanController');
 Route::get('/datapelatihan/hapus/{id}', 'DataPelatihanController@destroy');

 Route::resource('datapenelitian', 'DataPenelitianController');
 Route::get('/datapenelitian/hapus/{id}', 'DataPenelitianController@destroy');

 Route::resource('datapengabdian', 'DataPengabdianController');
 Route::get('/datapengabdian/hapus/{id}', 'DataPengabdianController@destroy');

 Route::resource('datapenghargaan', 'DataPenghargaanController');
 Route::get('/datapenghargaan/hapus/{id}', 'DataPenghargaanController@destroy');

 Route::resource('datapenugasan', 'DataPenugasanController');
 Route::get('/datapenugasan/hapus/{id}', 'DataPenugasanController@destroy');

 Route::resource('dataperaturan', 'DataPeraturanController');
 Route::get('/dataperaturan/hapus/{id}', 'DataPeraturanController@destroy');

 Route::resource('datastudy', 'DataStudyController');
 Route::get('/datastudy/hapus/{id}', 'DataStudyController@destroy');

 Route::resource('arsipcuti', 'DataArsipCutiController');
 Route::get('/arsipcuti/hapus/{id}', 'DataArsipCutiController@destroy');

 Route::resource('arsipkgb', 'DataArsipKgbController');
 Route::get('/arsipkgb/hapus/{id}', 'DataArsipKgbController@destroy');

 Route::resource('dataskp', 'DataSkpController');
 Route::get('/dataskp/hapus/{id}', 'DataSkpController@destroy');

 Route::resource('role', 'RoleController');
 Route::get('/role/hapus/{id}', 'RoleController@destroy');

 Route::resource('pengajuankgb', 'PengajuanKgbController');
 Route::get('/pengajuankgb/hapus/{id}', 'PengajuanKgbController@destroy');

 Route::resource('pengajuancuti', 'PengajuanCutiController');
 Route::get('/pengajuancuti/hapus/{id}', 'PengajuanCutiController@destroy');

 Route::resource('kehadiran', 'KehadiranController');
 Route::get('/kehadiran/hapus/{id}', 'KehadiranController@destroy');

