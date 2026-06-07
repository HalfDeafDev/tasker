<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin IdeHelperTaskInstance
 */
#[Fillable(
    'title', 'task_type_id',
    'due_date', 'task_definition_id',
    'active', 'completed'
)]
class TaskInstance extends Model
{
    use HasUuids;

    //
    public function taskDefinition(): BelongsTo
    {
        return $this->belongsTo(TaskDefinition::class);
    }

    public function taskType(): BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return MorphMany<TaskComponent, $this>
     */
    public function components(): MorphMany
    {
        return $this->morphMany(TaskComponent::class, 'component_owner');
    }
}
