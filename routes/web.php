<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;

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
    return redirect('beranda');
});
//menampilkan beranda untuk tamu
Route::resource('beranda', BerandaController::class);
//hanya admin yang bisa akses
Route::middleware('auth')->group(function(){
//menampilkan dashboard
    Route::resource('dashboard',DashboardController::class);
//menampilkan kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori/delete/{id}', [KategoriController::class, 'delete']);
//menampilkan menu
    Route::resource('menu', MenuController::class);
    Route::get('menu/delete/{id}', [MenuController::class, 'delete']);
});
//hanya admin yang bisa akses
Route::middleware('auth', 'owner')->group(function(){
//menampilkan user
Route::resource('user', UserController::class);
Route::get('user/delete/{id}', [UserController::class, 'delete']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
