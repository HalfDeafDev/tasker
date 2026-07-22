<?php

namespace Database\Seeders;

use App\Enums\FrequencyDayValues;
use App\Enums\FrequencyPeriodValues;
use App\Enums\FrequencyTypes;
use App\Enums\TaskTypes;
use App\Models\FrequencyDayValue;
use App\Models\FrequencyPeriodValue;
use App\Models\FrequencyType;
use App\Models\TaskType;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (FrequencyTypes::cases() as $type) {
            FrequencyType::updateOrCreate($type->seed());
        }

        foreach (FrequencyPeriodValues::cases() as $frequencyPeriod) {
            FrequencyPeriodValue::updateOrCreate($frequencyPeriod->seed());
        }

        foreach (FrequencyDayValues::cases() as $frequencyDay) {
            FrequencyDayValue::updateOrCreate($frequencyDay->seed());
        }
    }
}
