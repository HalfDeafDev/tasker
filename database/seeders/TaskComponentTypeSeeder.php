<?php

namespace Database\Seeders;

use App\Enums\TaskTypes;
use App\Enums\TaskComponentTypes;
use App\Models\TaskComponentType;
use App\Models\TaskType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskComponentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (TaskComponentTypes::cases() as $taskComponentType) {
            TaskComponentType::updateOrCreate($taskComponentType->seed());
        }
    }
}
