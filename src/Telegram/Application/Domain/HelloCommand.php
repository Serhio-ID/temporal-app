<?php

namespace App\Telegram\Application\Domain;

readonly class HelloCommand
{
    public function __construct(
        public string $chatId,
        public string $name,
    ) {
    }
}
