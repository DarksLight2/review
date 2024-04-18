<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;
use App\Domains\Box\Enums\EntityTypeEnum;

class EntityDTO
{
    use DTO;

    public function __construct(
        public string $id,
        public EntityTypeEnum $type,
    ) {}
}
