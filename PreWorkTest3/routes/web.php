<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');
});

Route::get('/booking',[BookingController::class, 'add']);
Route::post('/booking',[BookingController::class, 'create']);

Route::get('/booking/{booking}', [BookingController::class, 'edit']);
Route::post('/booking/{booking}', [BookingController::class, 'update']);
