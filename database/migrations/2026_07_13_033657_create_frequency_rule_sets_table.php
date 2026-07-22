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
        Schema::create('frequency_rule_sets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            /*
             * TaskDefinition | Component
             */
            $table->uuidMorphs('frequency_owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequency_rule_sets');
    }
};
