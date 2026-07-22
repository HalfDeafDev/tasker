<?php

namespace Database\Seeders;

use App\Enums\FrequencyPeriodValues;
use App\Enums\FrequencyTypes;
use App\Enums\TaskComponentTypes;
use App\Enums\TaskTypes;
use App\Enums\TimeUnits;
use App\Models\DescriptionInfo;
use App\Models\DueDateRule;
use App\Models\FrequencyPeriodValue;
use App\Models\FrequencyRuleSet;
use App\Models\FrequencySetRule;
use App\Models\TaskComponent;
use App\Models\TimeUnit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //        User::factory()->create([
        //            'name' => 'Test User',
        //            'email' => 'test@example.com',
        //        ]);

        $user = User::create([
            'name' => 'c',
            'email' => 'c@c',
            'password' => \Hash::make('testing123'),
        ]);

        $this->call([
            TimeUnitSeeder::class,
            TaskComponentTypeSeeder::class,
            TaskTypeSeeder::class,
            FrequencySeeder::class,
        ]);

        $oneOff = TaskTypes::OneOff->id();

        $task = $user->taskInstances()->create([
            'title' => 'Make a one-off task',
            'task_type_id' => $oneOff,
        ]);

        $taskDescription = DescriptionInfo::create([
            'body' => 'Show me you know how to do something simple.',
        ]);

        $component = $task->components()->make([
            'task_component_type_id' => TaskComponentTypes::Description->id(),
            'sort_order' => $task->components()->count() + 1,
        ]);

        $component->content()->associate($taskDescription);

        $component->save();

        $aDefinition = $user->taskDefinitions()->create([
            'title' => 'A one-off task definition',
            'task_type_id' => $oneOff,
        ]);

        $descriptionInfo = DescriptionInfo::create([
            'body' => 'This is an example of a task definition with a description..',
        ]);

        $descriptionComponent = $aDefinition->components()->make([
            'task_component_type_id' => TaskComponentTypes::Description->id(),
            'sort_order' => $task->components()->count() + 1,
        ]);

        $descriptionComponent->content()->associate($descriptionInfo);

        $descriptionComponent->save();

        $dueDateRuleInfo = DueDateRule::create([
            'amount' => 2,
            'unit' => TimeUnits::Day,
        ]);

        $dueDateRuleComponent = $aDefinition->components()->make([
            'task_component_type_id' => TaskComponentTypes::DueDateRule->id(),
            'sort_order' => $task->components()->count() + 1,
        ]);

        $dueDateRuleComponent->content()->associate($dueDateRuleInfo);

        $dueDateRuleComponent->save();

        $frequencyRuleSet = FrequencyRuleSet::make();
        $frequencyRuleSet->frequencyOwner()->associate($aDefinition);

        $frequencyRuleSet->save();

        $ruleSetUuid = $frequencyRuleSet->id;

        $fsrEveryTwoWeeks = FrequencySetRule::create([
            'frequency_rule_set_id' => $ruleSetUuid,
            'frequency_type' => FrequencyTypes::Period->slug(),
            'frequency_value' => FrequencyPeriodValues::Week->id(),
            'frequency_modifier' => 2,
        ]);


    }
}
