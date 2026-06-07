<?php

namespace Database\Seeders;

use App\Enums\TaskComponentTypes;
use App\Enums\TaskTypes;
use App\Models\DescriptionComponent;
use App\Models\TaskComponent;
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
            TaskComponentTypeSeeder::class,
            TaskTypeSeeder::class,
        ]);

        $oneOff = TaskTypes::OneOff->id();

        $task = $user->taskInstances()->create([
            'title' => 'Make a one-off task',
            'task_type_id' => $oneOff,
        ]);

        $taskDescription = DescriptionComponent::create([
            'body' => 'Show me you know how to do something simple.',
        ]);

        $component = $task->components()->make([
            'task_component_type_id' => TaskComponentTypes::Description->id(),
            'sort_order' => $task->components()->count() + 1,
        ]);

        $component->content()->associate($taskDescription);

        $component->save();
    }
}
