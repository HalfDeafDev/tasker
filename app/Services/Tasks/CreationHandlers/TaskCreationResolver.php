<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Services\Tasks\CreationHandlers\OneOffCreationHandler;

class TaskCreationResolver
{
    public function forDefinition(TaskDefinition $definition): CreatesTask
    {
        return app(OneOffCreationHandler::class);
    }
}
