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
        Schema::create('task_components', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuidMorphs('componentable');

            $table->foreignUuid('task_component_type_id')
                ->constrained('task_component_types')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->uuidMorphs('content');

            $table->integer('sort_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_components');
    }
};
