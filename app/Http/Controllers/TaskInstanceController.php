<?php

namespace App\Http\Controllers;

use App\Enums\TaskTypes;
use App\Models\TaskInstance;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskInstanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOneOff(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'completed' => ['sometimes', 'boolean'],
        ]);

        $validated['task_type_id'] = TaskType::where(
            'name', TaskTypes::OneOff)->value('id');

        $validated['completed'] = $validated['completed'] ?? false;

        $request->user()->taskInstances()->create($validated);

        return redirect()->route('tasks.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskInstance $taskInstance)
    {
        return Inertia::render('tasks/showTask', [
            'task' => $taskInstance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskInstance $taskInstance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskInstance $taskInstance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskInstance $taskInstance)
    {
        //
    }
}
