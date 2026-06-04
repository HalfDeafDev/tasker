<?php

namespace App\Http\Controllers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskComponentController extends Controller
{
    //
    public function storeDescriptionComponent(Request $request)
    {
        $validated = $request->validate([
            'description' => ['required', 'string'],
            'task_entity_type' => ['required', 'in:instance,definition'],
            'task_id' => ['required', 'uuid'],
        ]);

        $parent = match ($validated['task_entity_type']) {
            'instance' => TaskInstance::find($validated['task_id']),
            'definition' => TaskDefinition::find($validated['task_id']),
        };

        if (! $parent) {
            throw ValidationException::withMessages([
                'task_id' => 'The selected task id is invalid.',
            ]);
        }

//        $descriptionComponent
    }
}
