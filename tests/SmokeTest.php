<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class SmokePantherTest extends PantherTestCase
{

    /**
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful(string $sTitle, string $sUrl): void
    {
        $client = self::createPantherClient();
        $pCrawler = $client->request('GET', $sUrl);
        $this->assertPageTitleContains($sTitle);
    }

    public function provideUrls()
    {
        return [
            'accueil' => ['Le blog de Zozor!', '/'],
            'world' => ['Hello World', '/hello-world'],
            'hello' => ['Hello Oju', '/hello-world/oju'],
            'Shoe' => ['Add my shoe', '/shoe'],
        ];
    }
}
