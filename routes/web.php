<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\SuperAdmin\StaffController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk admin dengan middleware role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index'); // Ganti dengan view dashboard admin kamu
    })->name('admin.dashboard');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit'); // Route untuk menampilkan form edit
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update'); // Route untuk proses update
});

Route::prefix('admin')->middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/staff', [StaffController::class, 'store'])->name('admin.staff.store');
});