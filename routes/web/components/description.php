<?php

use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        /* Task Components */

        // Task Components - Description
        Route::post('component/create/description',
            [TaskComponentController::class, 'storeDescriptionComponent'])
            ->name('component.create.description');

        Route::get('dev/description/create', function (Request $request) {
            $tasks = $request->user()->taskInstances()->get();

            return Inertia::render(
                'dev/TaskDescriptionAdder',
                [
                    'instances' => $tasks,
                ]
            );
        });
    });
});
