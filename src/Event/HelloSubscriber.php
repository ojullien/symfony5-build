<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use UnexpectedValueException;

class HelloSubscriber implements EventSubscriberInterface
{
    private const DEFAULT_NAME = 'world';

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [HelloEvent::NAME => 'onResponse'];
    }

    /**
     * @throws UnexpectedValueException
     */
    public function onResponse(HelloEvent $theEvent): void
    {
        // Get name
        $sName = $theEvent->getName();

        // Update the reponse
        if (0 != \strcasecmp($sName, self::DEFAULT_NAME)) {
            $httpResponse = $theEvent->getHttpResponse();
            $sContent = $httpResponse->getContent();
            if (\is_string($sContent)) {
                $httpResponse->setContent($this->updateContent($sContent, $sName));
            }
        }
    }

    /**
     * Undocumented function.
     */
    private function updateContent(string $sContent, string $sName): string
    {
        return \str_replace('</h1>',
            \sprintf('</h1><p>Bienvenue parmi nous %s !</p>', $sName),
            $sContent);
    }
}
