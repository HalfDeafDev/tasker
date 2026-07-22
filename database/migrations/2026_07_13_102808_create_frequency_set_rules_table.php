<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('frequency_set_rules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('frequency_rule_set_id')
                ->constrained('frequency_rule_sets')
                ->cascadeOnDelete();
            $table->string('frequency_type');
            $table->foreign('frequency_type')
                ->references('slug')
                ->on('frequency_types');
            /*
             * FrequencyPeriodValues | FrequencyDayValues
             */
            $table->integer('frequency_value');
            $table->integer('frequency_modifier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequency_set_rules');
    }
};
