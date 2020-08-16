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

//Route::post('login', 'Admin\logincontroller@login');
Route::resource('Admin/materi', 'Admin\matericontroller');
Route::resource('Admin/kategori', 'Admin\kategoricontroller');
Route::resource('Admin/lihatmateri', 'Admin\matericontroller');
Route::resource('Admin/tambahsoal', 'Admin\soalcontroller');
Route::view('create', 'Admin.soal.create')->name('create');
Route::resource('Admin/belajarmateri', 'Admin\belajarcontroller');
Route::resource('Admin/matapelajaran', 'Admin\matapelajarancontroller');
Route::resource('Admin/ujian', 'Admin\ujiancontroller');
Route::post('ajaxRequest', 'Admin\matericontroller@ajaxRequestPost');
Route::post('ajaxRequestmateri', 'Admin\matericontroller@ajaxRequestPostmateri');
Route::post('ajaxRequestmapel', 'Admin\ujiancontroller@ajaxRequestPostmapel');
Route::post('ajaxRequestmateri', 'Admin\ujiancontroller@ajaxRequestPostmateri');
Route::post('ajaxRequest', 'Admin\soalcontroller@ajaxRequestPost');
Route::post('ajaxRequest1', 'Admin\soalcontroller@ajaxRequestPost1');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
