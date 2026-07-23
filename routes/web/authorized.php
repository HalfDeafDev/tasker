<?php

use App\Http\Controllers\TaskInstanceController;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('ddashboard', function () {
        return Inertia::render('DevDashboard');
    })->name('dev.dashboard');
});
