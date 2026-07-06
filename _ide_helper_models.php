<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property string $id
 * @property string $title
 * @property int $task_type_id
 * @property int $user_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\TimeUnit $taskType
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereTaskTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskDefinition whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTaskDefinition {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $due_date
 * @property int $active
 * @property int $completed
 * @property int $task_definition_id
 * @property int $task_type_id
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\TaskDefinition $taskDefinition
 * @property-read \App\Models\TimeUnit $taskType
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
	#[\AllowDynamicProperties]
	class IdeHelperTaskInstance {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskDefinition> $taskDefinitions
 * @property-read int|null $task_definitions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeUnit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTaskType {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\CarbonImmutable|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

