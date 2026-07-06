<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $slug
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TimeUnit extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
}
