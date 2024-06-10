<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
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

// Home
Route::get('/', [PagesController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
  // Dashboard
  Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
  // Photos
  Route::resource('/photos', PhotoController::class)->parameters(['photos' => 'photos:slug']);
});

Route::middleware('auth')->group(function () {
  // Profile
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth
require __DIR__ . '/auth.php';
