<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event as EventDispatcherEvent;

class HelloEvent extends EventDispatcherEvent
{
    public const NAME = 'bienvenue.utilisateur';

    /**
     * @param Response $httpResponse
     * @param string   $sName
     *
     * @return void
     */
    public function __construct(private Response $httpResponse, private string $sName)
    {
    }

    public function getName(): string
    {
        return $this->sName;
    }

    public function getHttpResponse(): Response
    {
        return $this->httpResponse;
    }
}
