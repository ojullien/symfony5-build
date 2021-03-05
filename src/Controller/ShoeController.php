<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Shoe;
use App\Entity\Size;
use App\Form\ShoeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoeController extends AbstractController
{
    /**
     * @Route("/shoe", name="shoe")
     */
    public function index(Request $request): Response
    {
        // creates a shoe object and initializes some data for this example
        //$pShoe = new Shoe('Vanez', 25, 'Une belle description de chaussure');
        $pShoe = new Shoe();
        $pShoe->setSizes([
            new Size(37.5),
            new Size(38),
            new Size(39),
            new Size(40),
        ]);

        $pForm = $this->createForm(ShoeType::class, $pShoe);

        $pForm->handleRequest($request);
        if ($pForm->isSubmitted() && $pForm->isValid()) {
            dump($pForm->getData());
        }

        return $this->render('shoe/index.html.twig', [
            'shoe_form' => $pForm->createView(),
        ]);
    }
}
