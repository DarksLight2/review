<?php

namespace App\Domains\Box\DTO;

use App\Domains\Box\Enums\StateEnum;

readonly class BoxDTO
{
    public function __construct(
        public string $id,
        public StateEnum $state,
        public array $recipients = [],
    ) {}
}
