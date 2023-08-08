<?php

use App\Http\Controllers\profileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [profileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [profileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
