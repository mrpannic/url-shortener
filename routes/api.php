<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ShortUrlController;

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

Route::post('shorten', [ShortUrlController::class, 'shorten']);
Route::post('check-url', [ShortUrlController::class, 'checkUrl']);

Route::get('links', [LinkController::class, 'index']);
Route::get('links/{shortCode}', [LinkController::class, 'show']);
