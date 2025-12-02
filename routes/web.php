<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/files', [FileUploadController::class, 'index'])->name('files.index');
    Route::post('/files', [FileUploadController::class, 'store'])->name('files.store');
    Route::get('/files/{fileUpload}/download', [FileUploadController::class, 'download'])->name('files.download');
    Route::delete('/files/{fileUpload}', [FileUploadController::class, 'destroy'])->name('files.destroy');
});


require __DIR__.'/auth.php';
