<?php

namespace App\Telegram\Application\Workflow;

use App\Activity\GreetingActivityInterface;
use App\Telegram\Application\Activity\CommandHelloActivityInterface;
use App\Telegram\Application\Domain\HelloCommand;
use Longman\TelegramBot\Entities\Message;
use Temporal\Activity\ActivityOptions;
use Temporal\Workflow;

class HelloWorkflow implements HelloWorkflowInterface
{
    private $helloActivity;

    public function __construct()
    {
        $this->helloActivity = Workflow::newActivityStub(
            CommandHelloActivityInterface::class,
            ActivityOptions::new()->withStartToCloseTimeout(\DateInterval::createFromDateString('30 seconds'))
        );
    }

    public function start(array $data): \Generator
    {
        $chatId = $data['message']['chat']['id'] ?? 480260812;
        $name = $data['message']['from']['first_name'] ?? 'No name';

        return yield $this->helloActivity->sendToSubscriber(new HelloCommand(
            $chatId,
            $name
        ));
    }
}
