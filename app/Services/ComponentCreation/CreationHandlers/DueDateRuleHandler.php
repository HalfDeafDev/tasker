<?php

namespace App\Services\ComponentCreation\CreationHandlers;

use App\Enums\TaskComponentTypes;
use App\Enums\TimeUnits;
use App\Models\Contracts\HasTaskComponents;
use App\Models\DescriptionInfo;
use App\Models\DueDateInfo;
use App\Models\DueDateRule;
use App\Models\TaskComponent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use LogicException;

class DueDateRuleHandler implements CreatesComponentFromConfig, CreatesComponentFromReference
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createFromReference(HasTaskComponents $task, TaskComponent $component): TaskComponent
    {
        if (! $component->isType(TaskComponentTypes::DueDateRule)) {
            throw new LogicException(
                'DueDateCreationHandler received a component that is not of type '.TaskComponentTypes::DueDateRule->slug().'.');
        }

        /** @var DueDateRule $content */
        $content = $component->assertContentIs(DueDateRule::class);

        return $this->createFromConfig($task, [
            'amount' => $content->amount,
            'unit' => $content->unit,
        ]);
    }

    public function createFromConfig(HasTaskComponents $task, array $config): TaskComponent
    {
        $validator = Validator::make($config, [
            'amount' => ['required', 'numeric', 'min:1'],
            'unit' => ['required', 'exists:time_units,slug'],
        ]);

        $validated = $validator->validate();

        $today = Carbon::today();

        $dueDate = match (TimeUnits::from($validated['unit'])) {
            TimeUnits::Second => $today->addSeconds($config['amount']),
            TimeUnits::Minute => $today->addMinutes($config['amount']),
            TimeUnits::Hour => $today->addHours($config['amount']),
            TimeUnits::Day => $today->addDays($config['amount']),
            TimeUnits::Week => $today->addWeeks($config['amount']),
            TimeUnits::Month => $today->addMonths($config['amount']),
            TimeUnits::Year => $today->addYears($config['amount']),
        };

        $info = DueDateInfo::create([
            'due_date' => $dueDate,
        ]);

        $typeModel = TaskComponentTypes::DueDate->model();

        /** @var TaskComponent $component */
        $component = $task->components()->make([
            'task_component_type_id' => $typeModel->id,
            'sort_order' => $task->components()->count(),
        ]);

        $component->content()->associate($info);

        $component->save();

        return $component;
    }
}
