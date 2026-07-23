<?php

namespace App\Http\Controllers;

use App\Enums\TaskComponentTypes;
use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Services\ComponentCreation\ComponentCreationService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskComponentController extends Controller
{
    public function storeDescriptionComponent(Request $request, ComponentCreationService $componentCreationService)
    {
        $validated = $request->validate([
            'body' => ['required', 'string'],
            'task_entity_type' => ['required', 'in:instance,definition'],
            'task_id' => ['required', 'uuid'],
        ]);

        $parent = match ($validated['task_entity_type']) {
            'instance' => [
                'task' => TaskInstance::find($validated['task_id']),
                'route' => 'instances.show',
            ],
            'definition' => [
                'task' => TaskDefinition::find($validated['task_id']),
                'route' => 'definitions.show',
            ],
        };

        if (! $parent) {
            throw ValidationException::withMessages([
                'task_id' => 'The selected task id is invalid.',
            ]);
        }

        $componentCreationService->
            createFromConfig($validated, TaskComponentTypes::Description, $parent['task']);

        return redirect()->route($parent['route'], $parent['task']);
    }

    public function storeDueDateRule(Request $request, ComponentCreationService $componentCreationService)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric'],
            'unit' => ['required', 'string'],
            'task_id' => ['required', 'uuid'],
        ]);

        $task = TaskDefinition::find($validated['task_id']);

        if (! $task) {
            throw ValidationException::withMessages([
                'task_id' => 'The selected task id is invalid.',
            ]);
        }

        $componentCreationService->
            createFromConfig($validated, TaskComponentTypes::DueDateRule, $task);

        return redirect()->route('definitions.show', $task);
    }
}
