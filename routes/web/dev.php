<?php

use App\Http\Controllers\TaskInstanceController;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(function () {
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
});
