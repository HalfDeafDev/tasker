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
        //
        $taskComponentTypes = [
            [
                'name' => TaskComponentTypes::Description,
                'slug' => 'description',
            ],
        ];

        foreach ($taskComponentTypes as $taskComponentType) {
            TaskComponentType::updateOrCreate($taskComponentType);
        } //
    }
}
