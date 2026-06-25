<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Services\Tasks\CreationHandlers\OneOffCreationHandler;

class TaskCreationResolver
{
    public function usingDefinition(TaskDefinition $definition): CreatesTaskFromDefinition
    {
        return app(OneOffCreationHandler::class);
    }

    public function usingConfig(Array $config): CreatesTaskFromConfig
    {
        return app(OneOffCreationHandler::class);
    }
}
