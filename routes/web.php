<?php

use App\Http\Controllers\TaskComponentController;
use App\Http\Controllers\TaskDefinitionController;
use App\Http\Controllers\TaskInstanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard', [
            'testprop' => [
                'message' => 'Hello, World!',
                'value' => 23,
            ],
        ])
        : Inertia::render('Welcome');
})->name('home');

Route::get('/dev/props', function (Request $request) {
    if ($request->filled('testProp')) {
        return Inertia::render('dev/Props', ['testProp' => $request->query('testProp')]);
    }

    return Inertia::render('dev/Props', ['testProp' => [
        'message' => 'Hello! This is the default message.',
        'value' => 23,
    ]]);
})->name('dev.props');

Route::get('/dev/props/redirect', function () {
    return redirect()->route('dev.props', ['testProp' => [
        'message' => 'Hello! This is the redirected message.',
        'value' => 99,
    ]]);
});

Route::get('/dev/props/null', function () {
    return Inertia::render('dev/Props', ['testProp' => null]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Template
    Route::get('dashboard', function (Request $request) {
        if ($request->filled('testprop')) {
            return Inertia::render('Dashboard', ['testprop' => $request->query('testprop')]);
        }

        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Task Instances
    Route::get('tasks/create', function () {
        return Inertia::render('dev/TaskInstanceCreate');
    })->name('tasks.create');

    Route::get('tasks', function (Request $request) {
        $tasks = $request->user()->taskInstances()->get();

        return Inertia::render(
            'dev/TaskInstanceList',
            [
                'tasks' => $tasks,
            ]
        );
    })->name('tasks.list');

    Route::post('tasks/create/one-off',
        [TaskInstanceController::class, 'storeOneOff'])
        ->name('tasks.create.one-off');

    Route::get('tasks/{taskInstance}',
        [TaskInstanceController::class, 'show'])
        ->name('tasks.show');

    // Task Definitions

    Route::get('definitions',
        [TaskDefinitionController::class, 'index'])
        ->name('definitions.index');

    Route::get('definitions/create',
        [TaskDefinitionController::class, 'create'])
        ->name('definitions.form');

    Route::post('definitions/create',
        [TaskDefinitionController::class, 'store'])
        ->name('definitions.create');

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
                'tasks' => $tasks,
            ]
        );
    });
});

require __DIR__.'/settings.php';
