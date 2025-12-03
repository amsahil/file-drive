<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');
});

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
Route::get('/run-migrations', function () {
    Artisan::call('migrate --force');
    return 'Migrations executed!';
});

Route::get('/upload-limits', function () {
    return [
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size'       => ini_get('post_max_size'),
        'memory_limit'        => ini_get('memory_limit'),
    ];
});

require __DIR__.'/auth.php';
