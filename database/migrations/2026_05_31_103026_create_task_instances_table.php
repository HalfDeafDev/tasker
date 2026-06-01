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
        Schema::create('task_instances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->datetimetz('due_date')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('completed')->default(false);
            $table->foreignId('task_definition_id')
                ->nullable()
                ->constrained('task_definitions')
                ->cascadeOnDelete();
            $table->foreignId('task_type_id')
                ->constrained('task_types')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->softDeletesDatetime();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_instances');
    }
};
