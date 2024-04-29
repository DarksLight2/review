<?php

namespace App\Domains\Box\Senders;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\Exceptions\EmailServiceException;

final class EmailSender extends BoxSenderContract
{
    public function send(BoxDTO $dto): void
    {
        foreach ($dto->recipients as $recipient) {
            if(is_null($recipient->email)) {
                $this->addFailure('Неуказанна электронная почта, отправка невозможна!', $recipient);
                continue;
            }

            try {
                $this->service->sendEmail(
                    $recipient->email,
                    $this->template("$recipient->firstname $recipient->surname")
                );
            } catch (EmailServiceException $e) {
                $this->addFailure("Не удалось отправить электронное сообщение. Причина: {$e->getMessage()}", $recipient);
            }
        }
    }

    private function template(string $recipient_name): string
    {
        return <<<EOT
        <html lang="ru">
            <head>
            <title></title>
            </head>
            <body>
                <h1>Wellcome, $recipient_name</h1>
                some text
            </body>
        </html>
        EOT;
    }
}
