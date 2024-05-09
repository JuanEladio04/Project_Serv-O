<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\CheckWorkSpaceRole;
use App\Http\Middleware\CheckWorkSpaceServer;
use App\Http\Middleware\CheckWorkSpaceServerRole;
use App\Http\Middleware\CheckWorkspaceUser;
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
        ->middleware(CheckWorkspaceUser::class);
    Route::resource('workSpace', WorkSpaceController::class)->only('edit', 'update')
        ->middleware(CheckWorkSpaceRole::class);

    Route::resource('server', ServerController::class)->middleware('verified')
    ->middleware(CheckWorkSpaceServer::class);
    Route::resource('server', ServerController::class)->only('edit', 'update')
    ->middleware(CheckWorkSpaceServerRole::class);

    Route::resource('service', ServiceController::class)->middleware(['verified', AuthAdmin::class]);

    Route::resource('command', CommandController::class);
});

require __DIR__ . '/auth.php';
