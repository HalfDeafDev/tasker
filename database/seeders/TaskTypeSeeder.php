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
            ['name' => TaskTypes::OneOff],
            ['name' => TaskTypes::Repeating],
            ['name' => TaskTypes::Recurring],
            ['name' => TaskTypes::Habit],
        ];

        foreach ($taskTypes as $taskType) {
            TaskType::updateOrCreate($taskType);
        }
    }
}
