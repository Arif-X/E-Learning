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

Route::get('/date', function () {
    return view('date');
});

// Auth Route
Auth::routes();

// Homepage
Route::get('/home', 'HomeController@index')->name('home');

// Mapel & Modul
Route::get('/mapel', 'PelajaranController@pelajaran');
Route::get('/mapel/semua', 'PelajaranController@pelajaranAll');
Route::get('/mapel/kelas/{kelas}', 'PelajaranController@pelajaranKelas');
Route::get('/mapel/{mapel}/{kelas}/{semester}', 'PelajaranController@lihat');
Route::get('/mapel/{mapel}/{kelas}/{semester}/{pertemuan}', 'ModulController@daftarModul');
Route::get('/mapel/{mapel}/{kelas}/{semester}/{pertemuan}/modul-dan-tugas', 'ModulController@detailModulDanPenugasan');
Route::post('/mapel/modul/tambah-atau-edit', 'ModulController@addOrEditModul');

// Tugas
Route::get('/tugas/{mapel}/{kelas}/{semester}/{pertemuan}', 'TugasController@tambahGet');
Route::post('/tugas/upload', 'TugasController@tambahOrEditPost');
Route::post('/mapel/penugasan/tambah-atau-edit', 'PenugasanController@tambah');

// Admin Panel
Route::get('/admin/index', 'AdminController@index');
// Data Siswa
Route::get('/admin/index/siswa', 'AdminController@indexSiswa');
Route::post('/admin/index/siswa/update', 'AdminController@editSiswa');
Route::post('/admin/index/siswa/add', 'AdminController@addSiswa');
Route::get('/admin/index/siswa/delete/{no_induk}', 'AdminController@deleteSiswa');
// Data Guru
Route::get('/admin/index/guru', 'AdminController@indexGuru');
Route::post('/admin/index/guru/update', 'AdminController@editGuru');
Route::post('/admin/index/guru/add', 'AdminController@addGuru');
Route::get('/admin/index/guru/delete/{no_induk}', 'AdminController@deleteGuru');

// Test Action
Route::get('/coba-query', 'CobaController@index');