<?php

namespace App\Internal\Google;

/**
 * @template T
 */
readonly class VerifyTokenDTO
{
    /**
     * @param AccessTokenStatus $status
     * @param T $data
     */
    public function __construct(
        public AccessTokenStatus $status,
        public mixed             $data = null,
    ) {}
}
