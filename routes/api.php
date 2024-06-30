<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// All posts
//http://127.0.0.1:8000/api/photos
Route::get('photos', [PhotoController::class, 'index']);

// Single post
//http://127.0.0.1:8000/api/photos/{photo}
Route::get('photos/{post}', [PhotoController::class, 'show']);

// All categories
//http://127.0.0.1:8000/api/categories
Route::get('categories', [CategoryController::class, 'index']);

// Store data dall'app frontend a quella backend tramite un payload
Route::post('contacts', [LeadController::class, 'store']);
