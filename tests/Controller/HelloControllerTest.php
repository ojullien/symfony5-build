<?php

namespace App\Tests\Controller;

use RuntimeException;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

/**
 * Functional test for the controllers defined inside BlogController.
 *
 * See https://symfony.com/doc/current/book/testing.html#functional-tests
 *
 * Execute the application tests using this command (requires PHPUnit to be installed):
 *
 *     $ cd your-symfony-project/
 *     $ ./vendor/bin/phpunit
 *
 * @package App\Tests\Controller
 */
class IndexControllerTest extends WebTestCase
{
    /**
     *
     * @return void
     * @throws RuntimeException
     * @throws LogicException
     * @throws ServiceCircularReferenceException
     * @throws ServiceNotFoundException
     */
    public function testHello(): void
    {
        $client = static::createClient();
        $client->catchExceptions(false);
        $client->request('GET', '/hello-world');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World','Sans argument, la page Hello World ne fonctionne pas');
    }

    /**
     *
     * @return void
     * @throws RuntimeException
     * @throws LogicException
     * @throws ServiceCircularReferenceException
     * @throws ServiceNotFoundException
     */
    public function testHelloWithArguments(): void
    {
        $client = static::createClient();
        $client->catchExceptions(false);
        $client->request('GET', '/hello-world/zozor');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello Zozor', 'Avec "zozor", la page Hello Zozor ne fonctionne pas');
    }

    /**
     *
     * @return void
     * @throws RuntimeException
     * @throws LogicException
     * @throws ServiceCircularReferenceException
     * @throws ServiceNotFoundException
     */
    public function testHelloWithAnEvent(): void
    {
        $client = static::createClient();
        $client->catchExceptions(false);
        $client->request('GET', '/hello-world/zozor');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('p:contains("Bienvenue parmi nous zozor !")', 'L\'événement ne fonctionne pas');
    }

}
