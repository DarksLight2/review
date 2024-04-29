<?php

namespace App\Domains\Box\Contracts;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\DTO\CreateBoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

interface RecipientActiveLogServiceContract extends BoxSenderServiceContract
{
    public function createRecipientActiveLog(string $message, string $recipient_id): void;
}
