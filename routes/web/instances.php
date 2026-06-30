<?php

use App\Http\Controllers\TaskInstanceController;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('instances/create', function () {
        return Inertia::render('dev/TaskInstanceCreate');
    })->name('instances.create');

    Route::get('instances',
        [TaskInstanceController::class, 'index']
    )->name('instances.list');

    Route::post('instances/create/one-off',
        [TaskInstanceController::class, 'storeOneOff'])
        ->name('instances.create.one-off');

    Route::get('instances/{taskInstance}',
        [TaskInstanceController::class, 'show'])
        ->name('instances.show');
});
