<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin IdeHelperTaskDefinition
 * @property string $id
 * @property string $title
 * @property int $task_type_id
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskComponent> $components
 * @property-read int|null $components_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskInstance> $instances
 * @property-read int|null $instances_count
 * @property-read \App\Models\TaskType $taskType
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereTaskTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereUserId($value)
 * @mixin \Eloquent
 */
#[Fillable('title', 'task_type_id')]
class TaskDefinition extends Model
{
    //
    use HasUuids;

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

    public function instances(): HasMany
    {
        return $this->hasMany(TaskInstance::class);
    }
}
