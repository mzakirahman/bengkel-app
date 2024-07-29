<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;

Route::get('/',[FrontendController::class, 'index'])->name('/');
Route::get('/auth',[AuthController::class, 'index'])->name('/auth');


Route::get('/regis',[FrontendController::class, 'regis'])->name('regis');
Route::post('/regisAct',[FrontendController::class, 'regisAct'])->name('regisAct');

Route::post('/loginAct',[AuthController::class, 'loginAct'])->name('loginAct');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/kel/{id}',[AdminController::class, 'kelByIdKec'])->name('kel/{id}');


Route::get('/lokasi',[FrontendController::class, 'lokasiBengkel'])->name('lokasi');

Route::group(['middleware' => ['cekBor:1']], function () {
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin/dashboard');
    
    Route::get('/admin/bengkel',[AdminController::class, 'bengkel'])->name('admin/bengkel');
    Route::post('/admin/bengkelInsert',[AdminController::class, 'bengkelInsert'])->name('admin/bengkelInsert');
    Route::post('/admin/bengkelUpdate',[AdminController::class, 'bengkelUpdate'])->name('admin/bengkelUpdate');
    Route::get('/admin/bengkelDelete/{id}',[AdminController::class, 'bengkelDelete'])->name('admin/bengkelDelete/{id}');
    
    Route::get('/admin/administrator',[AdminController::class, 'administrator'])->name('admin/administrator');
    Route::get('/admin/pengguna',[AdminController::class, 'pengguna'])->name('admin/pengguna');
});

Route::group(['middleware' => ['cekBor:2']], function () {
    Route::get('/bengkel/dashboard',[BengkelController::class, 'index'])->name('bengkel/dashboard');
    Route::get('/bengkel/jasa',[BengkelController::class, 'jasa'])->name('bengkel/jasa');
    Route::post('/bengkel/jasaInsert',[BengkelController::class, 'jasaInsert'])->name('bengkel/jasaInsert');
    Route::post('/bengkel/jasaUpdate',[BengkelController::class, 'jasaUpdate'])->name('bengkel/jasaUpdate');
    Route::get('/bengkel/jasaDelete/{id}',[BengkelController::class, 'jasaDelete'])->name('bengkel/jasaDelete/{id}');

    Route::get('/bengkel/transaksi-baru',[BengkelController::class, 'transaksiBaru'])->name('bengkel/transaksi-baru');
    Route::get('/bengkel/transaksi-proses',[BengkelController::class, 'transaksiProses'])->name('bengkel/transaksi-proses');
    Route::get('/bengkel/transaksi-selesai',[BengkelController::class, 'transaksiSelesai'])->name('bengkel/transaksi-selesai');
    Route::get('/bengkel/transaksi-tolak',[BengkelController::class, 'transaksiTolak'])->name('bengkel/transaksi-tolak');

    Route::get('/bengkel/detail/{id}',[BengkelController::class, 'transaksiById'])->name('bengkel/detail/{id}');
    Route::post('/bengkel/transaksiAct',[BengkelController::class, 'transaksiAct'])->name('bengkel/transaksiAct');

    Route::get('/bengkel/barang',[BengkelController::class, 'barang'])->name('bengkel/barang');
    Route::post('/bengkel/barangAct',[BengkelController::class, 'barangAct'])->name('bengkel/barangAct');
    Route::post('/bengkel/barangUpdate',[BengkelController::class, 'barangUpdate'])->name('bengkel/barangUpdate');
    
    Route::get('/bengkel/profil',[BengkelController::class, 'profil'])->name('bengkel/profil');

    Route::get('/bengkel/rating',[BengkelController::class, 'rating'])->name('bengkel/rating');
    Route::post('/bengkel/ratingUpdate',[BengkelController::class, 'ratingUpdate'])->name('bengkel/ratingUpdate');
    
});

Route::group(['middleware' => ['cekBor:3']], function () {
    Route::get('/app/dashboard',[FrontendController::class, 'home'])->name('app/dashboard');
    Route::get('/app/pesan/{id}',[FrontendController::class, 'pesan'])->name('app/pesan/{id}');
    Route::post('/app/pesanAct',[FrontendController::class, 'pesanAct'])->name('app/pesanAct');
    Route::get('/app/transaksi-baru',[FrontendController::class, 'transaksiBaru'])->name('app/transaksi-baru');
    Route::get('/app/transaksi-proses',[FrontendController::class, 'transaksiProses'])->name('app/transaksi-proses');
    Route::get('/app/transaksi-selesai',[FrontendController::class, 'transaksiSelesai'])->name('app/transaksi-selesai');
    Route::get('/app/transaksi-tolak',[FrontendController::class, 'transaksiTolak'])->name('app/transaksi-tolak');

    Route::get('/app/rating/{id}',[FrontendController::class, 'rating'])->name('app/rating/{id}');
    Route::post('/app/ratingAct',[FrontendController::class, 'ratingAct'])->name('app/ratingAct');
    
    Route::get('/app/profil',[FrontendController::class, 'profil'])->name('app/profil');
    Route::post('/app/profilUpdate',[FrontendController::class, 'profilUpdate'])->name('app/profilUpdate');

});