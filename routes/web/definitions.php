<?php

use App\Http\Controllers\TaskDefinitionController;
use App\Http\Controllers\TaskInstanceController;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('definitions',
        [TaskDefinitionController::class, 'index'])
        ->name('definitions.list');

    Route::get('definitions/create',
        [TaskDefinitionController::class, 'create'])
        ->name('definitions.form');

    Route::post('definitions/create',
        [TaskDefinitionController::class, 'store'])
        ->name('definitions.create');

    Route::get('definitions/{definition}',
        [TaskDefinitionController::class, 'show'])
        ->name('definitions.show');

    Route::post('definitions/{definition}/instantiate',
        [TaskDefinitionController::class, 'instantiate'])
        ->name('definitions.instantiate');
});
