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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/waiting', [App\Http\Controllers\HomeController::class, 'waiting'])->name('waiting');

Auth::routes();

// dashboard
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
// Route::get('/ProfilUser', [App\Http\Controllers\Auth\RegisterController::class, 'ProfilUser'])->name('ProfilUser');
