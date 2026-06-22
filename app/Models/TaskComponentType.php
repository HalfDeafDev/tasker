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
 * @property string|null $description
 * @property string|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskComponent> $taskComponents
 * @property-read int|null $task_components_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponentType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskComponentType extends Model
{
    //
    use HasUuids;

    public $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function taskComponents(): HasMany
    {
        return $this->hasMany(TaskComponent::class);
    }
}
