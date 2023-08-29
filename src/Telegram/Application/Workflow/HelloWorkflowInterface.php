<?php

namespace App\Telegram\Application\Workflow;

use Longman\TelegramBot\Entities\Message;
use Temporal\Workflow\WorkflowInterface;
use Temporal\Workflow\WorkflowMethod;

#[WorkflowInterface]
interface HelloWorkflowInterface
{
    #[WorkflowMethod('hello_workflow_start')]
    public function start(array $data): \Generator;
}
