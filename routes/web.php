<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Models\User;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\CheckWorkSpaceRole;
use App\Http\Middleware\CheckWorkSpaceUser;
use App\Http\Controllers\WorkSpaceController;
use App\Http\Middleware\CheckWorkSpaceServer;
use App\Http\Middleware\CheckWorkSpaceServerRole;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

    Route::resource('server', ServerController::class)->middleware([CheckWorkSpaceServer::class, 'verified']);
    Route::resource('server', ServerController::class)->only('edit', 'update')
        ->middleware(CheckWorkSpaceServerRole::class);

    Route::resource('service', ServiceController::class)->middleware([AuthAdmin::class, 'verified']);
    Route::resource('command', CommandController::class);
    Route::resource('user', UserController::class)->middleware([AuthAdmin::class, 'verified']);
});

Route::get('/termsAndConditions', function () {
    return view('legal.terms-and-conditions');
})->name('termsAndConditions');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');


require __DIR__ . '/auth.php';
