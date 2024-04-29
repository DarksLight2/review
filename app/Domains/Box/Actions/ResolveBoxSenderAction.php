<?php

namespace App\Domains\Box\Actions;

use App\Domains\Box\Senders\EmailSender;
use App\Domains\Box\Enums\SendMethodEnum;
use App\Domains\Box\Senders\TelegramSender;
use App\Domains\Box\Senders\WhatsappSender;
use App\Domains\Box\Senders\BoxSenderContract;
use App\Domains\Box\Contracts\BoxSenderServiceContract;

class ResolveBoxSenderAction
{
    public function handle(SendMethodEnum $method, BoxSenderServiceContract $service): BoxSenderContract
    {
        return match ($method) {
            SendMethodEnum::Email    => new EmailSender($service),
            SendMethodEnum::Telegram => new TelegramSender($service),
            SendMethodEnum::Whatsapp => new WhatsappSender($service),
        };
    }
}
