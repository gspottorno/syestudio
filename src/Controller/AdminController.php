<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\InglesIrregularVerbs;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'title' => 'Administración'
        ]);

    }

    /**
     * @Route("/admin/pr/irregularverbs", name="pr_irregularverbs")
     */
    public function pr_irregularverbs(): Response
    {

      $repo_iv = $this->getDoctrine()->getRepository(InglesIrregularVerbs::class);
      $iv = $repo_iv->findAll();

        return $this->render('admin/pr.irregularverbs.html.twig', [
            'controller_name' => 'AdminController',
            'title' => 'Administrar Irregular Verbs',
            'iv' => $iv
        ]);


    }
}
