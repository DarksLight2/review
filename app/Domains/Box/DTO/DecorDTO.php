<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;
use App\Domains\Box\Enums\DecorTypeEnum;

readonly class DecorDTO
{
    use DTO;

    public function __construct(
        public string        $id,
        public string        $resource,
        public string        $name,
        public DecorTypeEnum $type,
    ) {}
}
