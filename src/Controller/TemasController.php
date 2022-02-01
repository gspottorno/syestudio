<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cursos;
use App\Entity\Centros;
use App\Entity\Asignaturas;
use App\Entity\Temas;
use App\Entity\InglesIrregularVerbs;
use App\Entity\AlemanVocabulario;

class TemasController extends AbstractController
{
  /**
   * @Route("{centro}/{curso}/{asignatura}/{tema}", name="tema")
   */
  public function index($centro, $curso, $asignatura, $tema): Response
  {
    $repo_centros = $this->getDoctrine()->getRepository(Centros::class);
    $paso_centro = $repo_centros->findOneBy(['slug' => $centro]);

    $repo_cursos = $this->getDoctrine()->getRepository(Cursos::class);
    $paso_curso = $repo_cursos->findOneBy(['slug' => $curso]);

    $repo_asignaturas = $this->getDoctrine()->getRepository(Asignaturas::class);
    $paso_asignatura = $repo_asignaturas->findOneBy(['slug' => $asignatura]);

    $repo_temas = $this->getDoctrine()->getRepository(Temas::class);
    $paso_tema = $repo_temas->findOneBy(['slug' => $tema]);

      return $this->render('temas/index.html.twig', [
          'controller_name' => 'TemasController',
          'centro' => $paso_centro,
          'curso' => $paso_curso,
          'asignatura' => $paso_asignatura,
          'tema' => $paso_tema
      ]);
  }

  public function irregularVerbs()
  {
        $repo_iv = $this->getDoctrine()->getRepository(InglesIrregularVerbs::class);
        $iv = $repo_iv->findAll();

          return $this->render('temas/ingles/irregularVerbs.html.twig', [
              'iv' => $iv
          ]);
  }


    public function alemanVocabulario()
    {
          $repo_iv = $this->getDoctrine()->getRepository(AlemanVocabulario::class);
          $iv = $repo_iv->findAll();

            return $this->render('temas/aleman/vocabulario.html.twig', [
                'iv' => $iv
            ]);
    }

}
