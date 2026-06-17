<?php

namespace App\Http\Controllers;

use App\Enums\TaskTypes;
use App\Models\TaskDefinition;
use App\Models\TaskType;
use App\Services\Tasks\TaskCreationService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskDefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $definitions = $request->user()->taskDefinitions()->get();

        return Inertia::render(
            'dev/task_defintions/List',
            [
                'definitions' => $definitions,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $taskTypes = array_map(
            function (TaskTypes $taskType) {
                return $taskType->seed();
            },
            TaskTypes::cases()
        );

        return Inertia::render('dev/task_defintions/Create', [
            'task_types' => $taskTypes,
        ]);
    }

    public function instantiate(
        TaskDefinition $definition,
        Request $request,
        TaskCreationService $service
    ) {
        $instance = $service->instantiate($definition, $request->user());

        return redirect()
            ->route('tasks.show', $instance);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title' => ['required', 'string'],
            'task_type' => ['required', 'string', 'exists:task_types,slug'],
        ]);

        $taskTypeId = TaskType::where('slug', $validate['task_type'])->value('id');

        $definition = [
            'title' => $validate['title'],
            'task_type_id' => $taskTypeId,
        ];

        $request->user()->taskDefinitions()->create($definition);

        return redirect()->route('definitions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskDefinition $definition)
    {
        $data = [
            'id' => $definition->id,
            'title' => $definition->title,
            'created_at' => $definition->created_at,
            'updated_at' => $definition->updated_at,
            'components' => $definition->components
                ->sortBy('sort_order')
                ->map(fn ($component) => [
                    'id' => $component->id,
                    'task_type' => $component->taskComponentType->slug,
                    'sort_order' => $component->sort_order,
                    'content' => $component->content,
                ]),
        ];

        return Inertia::render(
            'definitions/showDefinition',
            [
                'definition' => $data,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskDefinition $taskDefinition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskDefinition $taskDefinition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskDefinition $taskDefinition)
    {
        //
    }
}
