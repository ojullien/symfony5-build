<?php

declare(strict_types=1);

namespace App\Controller;

use App\Event\HelloEvent;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use UnexpectedValueException;

class HelloController extends AbstractController
{
    /**
     * @param string $name
     *
     * @return Response
     *
     * @throws LogicException
     * @throws UnexpectedValueException
     */
    /*
    #[Route('/hello-world/{name}', name: 'hello', methods: ['GET'])]
    public function index(string $name="world"): Response
    {
        return $this->render('hello/index.html.twig', [
            'visitor_name' => \ucfirst($name),
        ]);
    }
    */

    /**
     * @param EventDispatcherInterface $theEventDispatcher
     * @param string                   $name
     *
     * @return Response
     */
    #[Route('/hello-world/{name}', name: 'hello', methods: ['GET'])]
    public function hello(EventDispatcherInterface $theEventDispatcher, string $name = 'world'): Response
    {
        //$httpResponse = new Response('<h1>Hello '. \ucfirst($name) . '</h1>');
        $httpResponse = $this->render('hello/index.html.twig', ['visitor_name' => \ucfirst($name)]);
        $theEvent = new HelloEvent($httpResponse, $name);
        $theEventDispatcher->dispatch($theEvent, HelloEvent::NAME);

        return $httpResponse;
    }
}
