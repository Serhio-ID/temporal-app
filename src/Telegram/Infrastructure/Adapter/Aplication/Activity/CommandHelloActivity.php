<?php

namespace App\Telegram\Infrastructure\Adapter\Aplication\Activity;

use App\Telegram\Application\Activity\CommandHelloActivityInterface;
use App\Telegram\Application\Domain\HelloCommand;
use Longman\TelegramBot\Request as TgRequest;
use Longman\TelegramBot\Telegram;

class CommandHelloActivity implements CommandHelloActivityInterface
{
    public function sendToSubscriber(HelloCommand $helloCommand): void
    {
        new Telegram('...');

        TgRequest::sendMessage([
            'chat_id' => $helloCommand->chatId,
            'text' => sprintf('Hello %s', $helloCommand->name)
        ]);
    }
}
