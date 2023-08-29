<?php

namespace App\Telegram\Application\Activity;

use App\Telegram\Application\Domain\HelloCommand;
use Temporal\Activity\ActivityInterface;
use Temporal\Activity\ActivityMethod;

#[ActivityInterface]
interface CommandHelloActivityInterface
{
    #[ActivityMethod("hello")]
    public function sendToSubscriber(HelloCommand $helloCommand): void;
}
