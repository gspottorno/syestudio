<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemasController extends AbstractController
{
    /**
     * @Route("/temas", name="temas")
     */
    public function index(): Response
    {
        return $this->render('temas/index.html.twig', [
            'controller_name' => 'TemasController',
        ]);
    }
}
