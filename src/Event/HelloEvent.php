<?php
namespace App\Event;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event as EventDispatcherEvent;

/**
 *
 * @package App\Event
 */
class HelloEvent extends EventDispatcherEvent
{

    public const NAME = 'bienvenue.utilisateur';

    /**
     *
     * @param Response $httpResponse
     * @param string $sName
     * @return void
     */
    public function __construct( private Response $httpResponse, private string $sName ) {}

    /**
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->sName;
    }

    /**
     *
     * @return Response
     */
    public function getHttpResponse() : Response
    {
        return $this->httpResponse;
    }
}
