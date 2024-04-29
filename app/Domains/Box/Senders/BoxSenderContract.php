<?php

namespace App\Domains\Box\Senders;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\DTO\RecipientDTO;
use App\Domains\Box\Contracts\BoxSenderServiceContract;

abstract class BoxSenderContract
{
    protected array $failures = [];

    public function __construct(
        public readonly BoxSenderServiceContract $service
    ) {}

    abstract public function send(BoxDto $dto): void;

    public function existsFailures(): bool
    {
        return !empty($this->failures);
    }

    public function addFailure(string $message, RecipientDTO $recipient): void
    {
        $this->failures[] = [
            'recipient' => $recipient,
            'message'   => $message
        ];
    }

    public function failed(): array
    {
        return $this->failures;
    }
}
