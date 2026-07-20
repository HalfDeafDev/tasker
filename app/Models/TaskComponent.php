<?php

namespace App\Models;

use App\Enums\TaskComponentTypes;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use LogicException;

/**
 * @property string $id
 * @property string $task_component_type_id
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 * @property string $component_owner_type
 * @property string $component_owner_id
 * @property string $content_type
 * @property string $content_id
 * @property int $sort_order
 * @property string|null $deleted_at
 * @property-read Model|\Eloquent $componentOwner
 * @property-read TaskComponentType|null $componentType
 * @property-read Model|\Eloquent $content
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereComponentOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereComponentOwnerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereContentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereTaskComponentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComponent whereUpdatedAt($value)
 * @property-read \App\Models\TaskComponentType $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FrequencyRuleSet> $frequencyRuleSet
 * @property-read int|null $frequency_rule_set_count
 * @mixin \Eloquent
 */
class TaskComponent extends Model
{
    //
    use HasUuids;

    protected $fillable = [
        'task_component_type_id',
        'sort_order',
    ];

    public function componentOwner(): MorphTo
    {
        return $this->morphTo('component_owner');
    }

    public function content(): MorphTo
    {
        return $this->morphTo();
    }

    public function componentType(): BelongsTo
    {
        return $this->belongsTo(TaskComponentType::class, 'task_component_type_id');
    }

    public function frequencyRuleSet(): MorphMany
    {
        return $this->morphMany(FrequencyRuleSet::class, 'frequency_owner');
    }

    public function isType(TaskComponentTypes $type): bool
    {
        return $this->componentType->slug == $type->slug();
    }

    public function contentIs(string $class): bool
    {
        return $this->content instanceof $class;
    }

    public function assertContentIs(string $class): Model
    {
        $content = $this->content;

        if (! $content instanceof $class) {
            throw new LogicException('Expected '. $class .' Component');
        }

        return $content;
    }
}
