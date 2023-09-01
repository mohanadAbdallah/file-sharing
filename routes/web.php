<?php

use App\Http\Controllers\FileUploadController;
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

Route::get('/',[FileUploadController::class,'viewFiles']);

Route::get('view-files',[FileUploadController::class,'viewFiles'])->name('files.view');
Route::post('file-upload',[FileUploadController::class,'upload'])->name('files.upload');
Route::get('file-upload-page',[FileUploadController::class,'uploadPage'])->name('files.uploadPage');
Route::get('file-download/{file}',[FileUploadController::class,'download'])->name('files.download');
Route::get('file-share-page/{id}',[FileUploadController::class,'share'])->name('files.share');
Route::delete('file-delete/{id}',[FileUploadController::class,'destroy'])->name('files.destroy');
Route::delete('file-deleteSelected',[FileUploadController::class,'deleteSelected'])->name('files.deleteSelected');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
