<?php

declare(strict_types=1);

namespace App\Telegram\Infrastructure\Input\Facade;

use App\Telegram\Application\Workflow\HelloWorkflowInterface;
use Temporal\Client\GRPC\ServiceClient;
use Temporal\Client\WorkflowClient;

class ChatFacade
{
    private $workflowClient;

    public function __construct()
    {
        $this->workflowClient = WorkflowClient::create(ServiceClient::create('localhost:7233'));
    }

    public function handle(array $post)
    {
        $workflow = $this->workflowClient->newWorkflowStub(
            HelloWorkflowInterface::class
        );

        $workflow->start($post);
    }
}
