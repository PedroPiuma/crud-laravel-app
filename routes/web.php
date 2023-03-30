<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\Main::class, 'home'])->name('home');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/submit', [\App\Http\Controllers\LoginController::class, 'submit'])->name('submit');
Route::get('/admin', [\App\Http\Controllers\LoginController::class, 'admin'])->name('dashboard');
