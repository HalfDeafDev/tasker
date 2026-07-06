<?php

namespace Database\Seeders;

use App\Enums\TaskTypes;
use App\Models\TaskType;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (TaskTypes::cases() as $taskType) {
            TaskType::updateOrCreate($taskType->seed());
        }
    }
}
