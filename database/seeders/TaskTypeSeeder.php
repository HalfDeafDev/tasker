<?php

namespace Database\Seeders;

use App\Models\TaskType;
use App\Enums\TaskTypes;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $taskTypes = [
            [
                'name' => TaskTypes::OneOff,
                'slug' => 'one-off',
            ],
            [
                'name' => TaskTypes::Repeating,
                'slug' => 'repeating',
            ],
            [
                'name' => TaskTypes::Recurring,
                'slug' => 'recurring',
            ],
            [
                'name' => TaskTypes::Habit,
                'slug' => 'habit',
            ],
        ];

        foreach ($taskTypes as $taskType) {
            TaskType::updateOrCreate($taskType);
        }
    }
}
