<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cursos;
use App\Entity\Centros;
use App\Entity\Asignaturas;
use App\Entity\Temas;

class GlobalsController extends AbstractController
{

    public function breadcrumb($url): Response
    {
      $arr = array("http://", "https://");
      $url = str_replace($arr, "", $url);
      $porciones = explode("/", $url);

      $paso_centro = null;
      $paso_curso = null;
      $paso_asignatura = null;
      $paso_tema = null;

      if(!empty($porciones[1])) {
      $repo_centros = $this->getDoctrine()->getRepository(Centros::class);
      $paso_centro = $repo_centros->findOneBy(['slug' => $porciones[1]]);
      }
      if(!empty($porciones[2])) {
      $repo_cursos = $this->getDoctrine()->getRepository(Cursos::class);
      $paso_curso = $repo_cursos->findOneBy(['slug' => $porciones[2]]);
      }
      if(!empty($porciones[3])) {
      $repo_asignaturas = $this->getDoctrine()->getRepository(Asignaturas::class);
      $paso_asignatura = $repo_asignaturas->findOneBy(['slug' => $porciones[3]]);
      }
      if(!empty($porciones[4])) {
      $repo_temas = $this->getDoctrine()->getRepository(Temas::class);
      $paso_tema = $repo_temas->findOneBy(['slug' => $porciones[4]]);
      }
        return $this->render('globals/breadcrumb.html.twig', [
            'controller_name' => 'GlobalsController',
            'centro' => $paso_centro,
            'curso' => $paso_curso,
            'asignatura' => $paso_asignatura,
            'tema' => $paso_tema
        ]);
    }


}
