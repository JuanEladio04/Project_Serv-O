<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\CheckWorkSpaceRole;
use App\Http\Middleware\CheckWorkSpaceServer;
use App\Http\Middleware\CheckWorkSpaceServerRole;
use App\Http\Middleware\CheckWorkSpaceUser;
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

    Route::resource('workSpace', WorkSpaceController::class);
    Route::resource('workSpace', WorkSpaceController::class)->only('show', 'edit', 'update')
        ->middleware(CheckWorkSpaceUser::class);
    Route::resource('workSpace', WorkSpaceController::class)->only('edit', 'update')
        ->middleware(CheckWorkSpaceRole::class);

    Route::resource('server', ServerController::class)->middleware('verified')
    ->middleware(CheckWorkSpaceServer::class);
    Route::resource('server', ServerController::class)->only('edit', 'update')
    ->middleware(CheckWorkSpaceServerRole::class);

    Route::resource('service', ServiceController::class)->middleware([AuthAdmin::class, 'verified']);
    Route::resource('command', CommandController::class);
    Route::resource('user', UserController::class)->middleware([AuthAdmin::class, 'verified']);
});

Route::get('/termsAndConditions', function () {
    return view('legal.terms-and-conditions');
})->name('termsAndConditions');

require __DIR__ . '/auth.php';
