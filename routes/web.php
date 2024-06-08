<?php

use App\Http\Controllers\EventManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Console\EventMakeCommand;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // event management route
    Route::get('/event', [EventManagementController::class, 'index'])
        ->name('event.index');
    Route::post('/event', [EventManagementController::class, 'store'])
        ->name('event.create');
    Route::get('/event/{event}', [EventManagementController::class, 'edit'])
        ->name('event.edit');
    Route::put('/event/{event}', [EventManagementController::class, 'update'])
        ->name('event.update');
    Route::delete('/event/{event}', [EventManagementController::class, 'delete'])
        ->name('event.delete');
});

require __DIR__.'/auth.php';
