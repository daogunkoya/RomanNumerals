<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RomanNumeralsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/convert', [\App\Http\Controllers\RomanNumeralController::class, 'convert']);
Route::get('/recent-conversions', [\App\Http\Controllers\RomanNumeralController::class, 'recentConversions']);
Route::get('/top-conversions', [\App\Http\Controllers\RomanNumeralController::class, 'topConversions']);
