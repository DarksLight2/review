<?php

namespace App\Domains\Box\Actions;

use App\Domains\Box\Contracts\RecipientActiveLogServiceContract;

class ResolveFailuresAction
{
    public function handle(RecipientActiveLogServiceContract $service, array $failures): void
    {
        foreach ($failures as $failure) {
            $service->createRecipientActiveLog($failure['message'], $failure['recipient']);
        }
    }
}
