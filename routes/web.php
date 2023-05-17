<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contencontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\BukuController;


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
Route::get('/contak', [contencontroller::class, 'contak']);
Route::resource('mapel', MapelController::class); 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');

Route::get('/home', [contencontroller::class, 'index'])->name('home.index')->middleware('auth');
Route::get('logout',[UserController::class,'logout'])->middleware('auth');
Route::get('/changePassword',[UserController::class,'showChangePasswordForm'])->middleware('auth');
Route::post('/changePassword',[UserController::class,'changePassword'])->name('changePassword')->middleware('auth');
Route::resource('siswa', SiswaController::class); 
Route::resource('buku', BukuController::class); 
