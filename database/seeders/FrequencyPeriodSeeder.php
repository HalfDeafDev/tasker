<?php

namespace Database\Seeders;

use App\Enums\FrequencyPeriodValues;
use App\Enums\TaskTypes;
use App\Models\FrequencyPeriodValue;
use App\Models\TaskType;
use Illuminate\Database\Seeder;

class FrequencyPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (FrequencyPeriodValues::cases() as $frequencyPeriod) {
            FrequencyPeriodValue::updateOrCreate($frequencyPeriod->seed());
        }
    }
}
