<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkSpaceController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('workSpace', WorkSpaceController::class)->middleware('auth');
Route::resource('server', ServerController::class)->middleware('auth');

require __DIR__ . '/auth.php';
