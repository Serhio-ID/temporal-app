<?php

declare(strict_types=1);

use App\Telegram\Application\Workflow\HelloWorkflow;
use App\Telegram\Infrastructure\Adapter\Aplication\Activity\CommandHelloActivity;
use Temporal\WorkerFactory;

ini_set('display_errors', 'stderr');
include "vendor/autoload.php";

// factory initiates and runs task queue specific activity and workflow workers
$factory = WorkerFactory::create();

// Worker that listens on a Task Queue and hosts both workflow and activity implementations.
$worker = $factory->newWorker();

// Workflows are stateful. So you need a type to create instances.
$worker->registerWorkflowTypes(HelloWorkflow::class);

// Activities are stateless and thread safe. So a shared instance is used.
$worker->registerActivity(CommandHelloActivity::class);

// In case an activity class requires some external dependencies provide a callback - factory
// that creates or builds a new activity instance. The factory should be a callable which accepts
// an instance of ReflectionClass with an activity class which should be created.
//$worker->registerActivity(App\DemoActivity::class, fn(ReflectionClass $class) => $container->create($class->getName()));

// start primary loop
$factory->run();