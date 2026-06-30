<?php

use App\Http\Controllers\TaskInstanceController;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('instances/create', function () {
        return Inertia::render('dev/TaskInstanceCreate');
    })->name('instances.create');

    Route::get('instances', function (Request $request) {
        $tasks = $request->user()->taskInstances()->get();

        return Inertia::render(
            'dev/TaskInstanceList',
            [
                'instances' => $tasks,
            ]
        );
    })->name('instances.list');

    Route::post('instances/create/one-off',
        [TaskInstanceController::class, 'storeOneOff'])
        ->name('instances.create.one-off');

    Route::get('instances/{taskInstance}',
        [TaskInstanceController::class, 'show'])
        ->name('instances.show');
});
