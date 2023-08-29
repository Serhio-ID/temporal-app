<?php

namespace App\Console;

use Longman\TelegramBot\Telegram;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetWebhook extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $telegram = new Telegram('...');

        $r = $telegram->setWebhook('https://...ngrok-free.app/webhook-gateway', ['allowed_updates' => []]);

        $output->writeln(sprintf('Webhook setted: %s', $r->isOk() ? 'OK' : 'ERROR'));

        return 0;
    }

    protected function configure(): void
    {
        $this->setName('telegram:set-webhook');
    }
}
