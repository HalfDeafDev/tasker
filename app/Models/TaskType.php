<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskDefinition> $taskDefinitions
 * @property-read int|null $task_definitions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskInstance> $taskInstances
 * @property-read int|null $task_instances_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
#[Fillable(['name'])]
class TaskType extends Model
{
    use HasUuids;

    public function taskDefinitions(): HasMany
    {
        return $this->hasMany(TaskDefinition::class);
    }

    public function taskInstances(): HasMany
    {
        return $this->hasMany(TaskInstance::class);
    }
}
