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

Route::middleware(['auth'])->group(function () {
    //user
    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('delete-user/{id_user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-user');
    Route::post('/add-user', [App\Http\Controllers\UserController::class, 'store'])->name('add-user');
    Route::put('/update-user/{id_user}', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');
    Route::get('{id}/edit-user', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');

    //barang (protected by auth middleware)
    Route::get('produk', [App\Http\Controllers\ProdukController::class,'index'])->name('produk');
    Route::post('add-produk', [App\Http\Controllers\ProdukController::class,'store'])->name('add-produk');
    Route::get('delete-produk/{id_produk}', [App\Http\Controllers\ProdukController::class,'destroy'])->name('delete-produk');
    Route::put('update-produk/{id_produk}', [App\Http\Controllers\ProdukController::class,'update'])->name('update-produk');
    Route::get('{id_produk}/edit-produk', [App\Http\Controllers\ProdukController::class,'edit'])->name('edit-produk');
});

// dashboard
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
// Route::get('/ProfilUser', [App\Http\Controllers\Auth\RegisterController::class, 'ProfilUser'])->name('ProfilUser');
