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

Route::get('/', 'UserController@Welcome')->name('landing');

Auth::routes();

Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Rekap
Route::post('/admin/rekap/mahasiswa/create', 'AdminController@createmhs')->name('admin.rekap.mhs.create');
Route::get('/admin/rekap/mahasiswa', 'AdminController@rekapmhs')->name('admin.rekap.mhs');
Route::get('/admin/rekap/mahasiswa/edit/{id}', 'AdminController@editmhs')->name('admin.edit.mhs');
Route::post('/admin/rekap/mahasiswa/update/{id}', 'AdminController@updatemhs')->name('admin.update.mhs');
Route::get('/admin/rekap/mahasiswa/delete/{id}', 'AdminController@deletemhs')->name('admin.delete.mhs');

Route::get('/admin/rekap/dosen', 'AdminController@rekapdsn')->name('admin.rekap.dsn');
Route::get('/admin/rekap/dosen/edit/{id}', 'AdminController@editdsn')->name('admin.edit.dsn');
Route::post('/admin/rekap/dosen/update/{id}', 'AdminController@updatedsn')->name('admin.update.dsn');
Route::get('/admin/rekap/dosen/delete/{id}', 'AdminController@deletedsn')->name('admin.delete.dsn');

Route::get('/admin/tugasakhir/permohonan', 'AdminController@PermohonanTA')->name('admin.permohonan.ta');
Route::get('/admin/tugasakhir/permohonan/cek/{id}', 'AdminController@CekPermohonanTA')->name('admin.cek.permohonan');
Route::post('/admin/tugasakhir/permohonan/update/{id}', 'AdminController@UpdatePermohonanTA')->name('admin.up.permohonan');
Route::get('/admin/tugasakhir/permohonan/delete/{id}', 'AdminController@DeletePermohonanTA')->name('admin.del.permohonan');
Route::get('/admin/tugasakhir/list', 'AdminController@ListTA')->name('admin.list.ta');
Route::post('/admin/tugasakhir/list/update/{id}', 'AdminController@UpdateListTA')->name('admin.list.update');
Route::get('/admin/tugasakhir/selesai', 'AdminController@SelesaiTA')->name('admin.selesai.ta');

Route::get('/mahasiswa/review', 'MahasiswaController@Review')->name('mhs.review');
Route::post('/mahasiswa/permohonan/post', 'MahasiswaController@PostDaftarTA')->name('mhs.submit.ta');
Route::get('/mahasiswa/settings', 'MahasiswaController@Settings')->name('mhs.settings');
Route::post('/mahasiswa/settings/update/{id}', 'MahasiswaController@SettingsUpdate')->name('mhs.settings.update');
Route::get('/mahasiswa/tugasakhir/permohonan', 'MahasiswaController@DaftarTA')->name('mhs.daftar.ta');