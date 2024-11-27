<?php

use App\Http\Controllers\FarmGroupController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Mendefinisikan konstanta untuk menghindari duplikasi string
define('PROFILE_ROUTE', '/profile');
define('FARM_GROUPS_ROUTE', '/farm-groups');
define('FARMERS_ROUTE', '/farmers');
define('ID_PLACEHOLDER', '/{id}');

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

// Route default
Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard tanpa middleware auth dan verified (akses bebas)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk profile (tanpa middleware auth jika ingin akses bebas)
Route::middleware('auth')->group(function () {
    Route::get(PROFILE_ROUTE, [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch(PROFILE_ROUTE, [ProfileController::class, 'update'])->name('profile.update');
    Route::delete(PROFILE_ROUTE, [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk FarmGroupController (akses bebas)
Route::prefix(FARM_GROUPS_ROUTE)->group(function () {
    Route::get('/', [FarmGroupController::class, 'index'])->name('farm_groups.index'); // Menampilkan daftar farm groups
    Route::get('/create', [FarmGroupController::class, 'create'])->name('farm_groups.create'); // Form untuk membuat farm group
    Route::post('/', [FarmGroupController::class, 'store'])->name('farm_groups.store'); // Menyimpan farm group baru
    Route::get(ID_PLACEHOLDER, [FarmGroupController::class, 'show'])->name('farm_groups.show'); // Menampilkan farm group berdasarkan ID
    Route::get(ID_PLACEHOLDER.'/edit', [FarmGroupController::class, 'edit'])->name('farm_groups.edit'); // Form untuk edit farm group
    Route::put(ID_PLACEHOLDER, [FarmGroupController::class, 'update'])->name('farm_groups.update'); // Update farm group berdasarkan ID
    Route::delete(ID_PLACEHOLDER, [FarmGroupController::class, 'destroy'])->name('farm_groups.destroy'); // Hapus farm group berdasarkan ID
});

// Route untuk FarmerController (akses bebas)
Route::prefix(FARMERS_ROUTE)->group(function () {
    Route::get('/', [FarmerController::class, 'index'])->name('farmers.index'); // Menampilkan daftar petani
    Route::get('/create', [FarmerController::class, 'create'])->name('farmers.create'); // Form untuk membuat petani
    Route::post('/', [FarmerController::class, 'store'])->name('farmers.store'); // Menyimpan petani baru
    Route::get(ID_PLACEHOLDER, [FarmerController::class, 'show'])->name('farmers.show'); // Menampilkan petani berdasarkan ID
    Route::get(ID_PLACEHOLDER.'/edit', [FarmerController::class, 'edit'])->name('farmers.edit'); // Form untuk edit petani
    Route::put(ID_PLACEHOLDER, [FarmerController::class, 'update'])->name('farmers.update'); // Update petani berdasarkan ID
    Route::delete(ID_PLACEHOLDER, [FarmerController::class, 'destroy'])->name('farmers.destroy'); // Hapus petani berdasarkan ID
});

// Jika menggunakan Laravel Breeze atau Laravel UI untuk autentikasi, bisa masukkan routes autentikasi
//require_once __DIR__.'/auth.php';
