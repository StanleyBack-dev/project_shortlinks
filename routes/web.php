<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortlinkController;
use App\Http\Controllers\AuthController;

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

// A rota abaixo é utilizada para processar o formulário e criar shortlinks
Route::post('/shortlinks', [ShortlinkController::class, 'store'])->name('shortlinks.store');

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rota protegida por autenticação para listar shortlinks
Route::get('/shortlinks', [ShortlinkController::class, 'index'])->middleware('auth')->name('shortlinks.index');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/s/{id}', [ShortlinkController::class, 'redirect'])->name('shortlinks.redirect');