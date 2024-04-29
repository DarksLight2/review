<?php

namespace App\Domains\Box\Contracts;

use App\Domains\Box\Exceptions\EmailServiceException;

interface BoxSenderServiceContract
{
    /**
     * @throws EmailServiceException
     * @param string $email
     * @param string $content
     * @return void
     */
    public function sendEmail(string $email, string $content): void;
    public function sendTelegram(): void;
    public function sendWhatsapp(): void;
}
