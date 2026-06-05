<?php

namespace App\Http\Controllers;

use App\Models\DescriptionComponent;
use App\Models\TaskComponent;
use App\Models\TaskComponentType;
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
            'body' => ['required', 'string'],
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

        $descriptionComponent = DescriptionComponent::create([
            'body' => $validated['body'],
        ]);

        $descriptionType = TaskComponentType::where('slug', 'description')->firstOrFail();

        /** @var TaskComponent $component */
        $component = $parent->components()->make([
            'task_component_type_id' => $descriptionType->id,
            'sort_order' => $parent->components()->count(),
        ]);

        $component->content()->associate($descriptionComponent);

        $component->save();

        return $parent;
    }
}
