<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read Model|\Eloquent $frequencyOwner
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereUpdatedAt($value)
 * @property string $rule_set_owner_type
 * @property string $rule_set_owner_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereRuleSetOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereRuleSetOwnerType($value)
 * @property string $frequency_owner_type
 * @property string $frequency_owner_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FrequencySetRule> $rules
 * @property-read int|null $rules_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereFrequencyOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyRuleSet whereFrequencyOwnerType($value)
 * @mixin \Eloquent
 */
class FrequencyRuleSet extends Model
{
    use HasUuids;

    /**
     * @return MorphTo<TaskDefinition|TaskComponent, $this>
     */
    public function frequencyOwner(): MorphTo
    {
        return $this->morphTo('frequency_owner');
    }

    public function rules(): HasMany
    {
        return $this->hasMany(FrequencySetRule::class);
    }
}
