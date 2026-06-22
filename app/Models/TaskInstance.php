<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin IdeHelperTaskInstance
 * @property string $id
 * @property string $title
 * @property string|null $due_date
 * @property int $active
 * @property int $completed
 * @property int|null $task_definition_id
 * @property int $task_type_id
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskComponent> $components
 * @property-read int|null $components_count
 * @property-read \App\Models\TaskDefinition|null $definition
 * @property-read \App\Models\TaskType $taskType
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereTaskDefinitionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereTaskTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskInstance whereUserId($value)
 * @mixin \Eloquent
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
    public function definition(): BelongsTo
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
