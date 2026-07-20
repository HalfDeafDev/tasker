<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FrequencyType extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
}
