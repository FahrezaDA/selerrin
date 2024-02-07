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

//user
Route::get('/indexUser', [App\Http\Controllers\UserController::class, 'index'])->name('indexUser');
Route::get('/delete-user', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-user');
Route::post('/add-user', [App\Http\Controllers\UserController::class, 'store'])->name('add-user');
Route::put('/update-user', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');



// dashboard
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
// Route::get('/ProfilUser', [App\Http\Controllers\Auth\RegisterController::class, 'ProfilUser'])->name('ProfilUser');
