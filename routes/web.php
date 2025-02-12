<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContactUsController;
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

Route::get('/thebosss', function () {
    return view('thebosss');
});

Route::get('/jwot', function () {
    return view('jwot');
});

Route::get('/ai', function () {
    return view('ai');
});


Route::post('/contact-us', [ContactUsController::class, 'sendContact'])->name('sendContact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact-list', [ContactUsController::class, 'contactList'])->middleware(['auth'])->name('contactList');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

// Add profile edit for admin.
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__.'/admin-auth.php';
