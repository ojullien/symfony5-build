<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello-world/{name}', name: 'hello', methods: ['GET'])]
    public function index(string $name="world"): Response
    {
        return $this->render('hello/index.html.twig', [
            'visitor_name' => \ucfirst($name),
        ]);
    }
}
