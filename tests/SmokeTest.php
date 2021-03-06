<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SmokeTest extends WebTestCase
{

    /**
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful(string $sPageName, string $sUrl): void
    {
        $client = self::createClient();
        $client->request('GET', $sUrl);
        $this->assertResponseIsSuccessful(sprintf('La page "%s" devrait être accessible', $sPageName));
    }

    public function provideUrls()
    {
        return [
            'accueil' => ['Home', '/'],
            'world' => ['Hello World', '/hello-world'],
            'hello' => ['Hello oju', '/hello-world/oju'],
            'Shoe' => ['Shoe', '/shoe'],
        ];
    }
}
