<?php

use App\Http\Controllers\FileUploadController;
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
    return view('files.upload');
})->name('file.upload.form');

Route::post('file-upload',[FileUploadController::class,'upload'])
    ->name('file.upload');

Route::post('file-send-email',[FileUploadController::class,'sendEmail'])
    ->name('file.upload.sendEmail');

Route::get('file-download',[FileUploadController::class,'downloadPage'])
    ->name('file.download.form');

Route::post('download',[FileUploadController::class,'download'])
    ->name('file.download');
