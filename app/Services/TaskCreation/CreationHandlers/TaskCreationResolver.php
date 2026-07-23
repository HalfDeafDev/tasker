<?php

namespace App\Services\TaskCreation\CreationHandlers;

use App\Models\TaskDefinition;
use App\Services\TaskCreation\CreationHandlers\OneOffCreationHandler;

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
