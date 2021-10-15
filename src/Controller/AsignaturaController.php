<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cursos;
use App\Entity\Centros;
use App\Entity\Asignaturas;

class AsignaturaController extends AbstractController
{
    /**
     * @Route("{centro}/{curso}/{asignatura}", name="asignatura")
     */
    public function index($centro, $curso, $asignatura): Response
    {
      $repo_centros = $this->getDoctrine()->getRepository(Centros::class);
      $repo_cursos = $this->getDoctrine()->getRepository(Cursos::class);
      $repo_asignaturas = $this->getDoctrine()->getRepository(Asignaturas::class);
      $paso_centro = $repo_centros->findOneBy(['slug' => $centro]);
      $paso_curso = $repo_cursos->findOneBy(['slug' => $curso]);
      $paso_asignatura = $repo_asignaturas->findOneBy(['asignatura' => $asignatura]);

        return $this->render('asignatura/index.html.twig', [
            'controller_name' => 'AsignaturaController',
            'centro' => $paso_centro,
            'curso' => $paso_curso,
            'asignatura' => $asignatura
        ]);
    }
}
