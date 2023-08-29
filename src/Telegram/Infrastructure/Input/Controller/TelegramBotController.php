<?php

declare(strict_types=1);

namespace App\Telegram\Infrastructure\Input\Controller;

use App\Telegram\Infrastructure\Input\Facade\ChatFacade;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TelegramBotController
{
    public function __construct(private ChatFacade $chatFacade) {}

    public function __invoke(Request $request): Response
    {
        $post = (array)json_decode($request->getContent(), true);

        $this->chatFacade->handle($post);

        return new Response('OK UNB');
    }
}
