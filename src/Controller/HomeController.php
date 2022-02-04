<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cursos;
use App\Entity\Centros;
use App\Entity\Asignaturas;
use App\Entity\Relaciones;

class HomeController extends AbstractController
{

        /**
       * @Route("/", name="", name ="home")
       */
      public function index(Request $request): response
      {

        $page = $request->query->get('page', 1);

        // $centros = $this->getDoctrine()->getRepository(Centros::class)->findAll();

        $repository = $this->getDoctrine()->getRepository(Centros::class);
        // $centros = $repository->find(1);
        // $centros = $repository->findOneBy(['idCurso' => $idCurso]);
        // $centros = $repository->findOneBy(['name' => 'Robert', 'id' => 5]);
        // $centros = $repository->findBy(['name' => 'Robert'],['id' => 'DESC']);
        $centros = $repository->findAll();
        //dump($centros);

         if(!$centros)
         {
             throw $this->createNotFoundException('Ningún centro encontrado');
         }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'CursosController',
            'title' => 'Cursos CEIP',
            'centros' => $centros,
            'page' => $page
        ]);

      }

  //**

      public function cursosCentro($idCentro)
      {

        $entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager->getConnection();

        $sql2 = '
        SELECT cursos.id_curso, cursos.curso, cursos.slug, relaciones.id_centro, centros.slug as slug_centro
          FROM cursos
          INNER JOIN relaciones ON relaciones.id_curso = cursos.id_curso
          INNER JOIN centros ON centros.id_centro = relaciones.id_centro
          WHERE relaciones.id_centro = :id_centro
          GROUP BY relaciones.id_curso
          ORDER BY cursos.orden asc
        ';
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute(['id_centro' => $idCentro]);
        $datos2 = $stmt2->fetchAll();

        //dump($datos2);

           return $this->render('home/includes/listCursosById.html.twig', [
               'cursos' => $datos2,
           ]);

      }

  //**

  public function asignaturasCurso($idCentro, $idCurso)
  {

    $entityManager = $this->getDoctrine()->getManager();
    $conn = $entityManager->getConnection();

    $sql3 = '
    SELECT asignaturas.id_asignatura, asignaturas.asignatura, asignaturas.slug as slug_asignatura, relaciones.id, cursos.slug as slug_curso, centros.slug as slug_centro
      FROM asignaturas
      INNER JOIN relaciones ON relaciones.id_asignatura = asignaturas.id_asignatura
      INNER JOIN cursos ON cursos.id_curso = relaciones.id_curso
      INNER JOIN centros ON centros.id_centro = relaciones.id_centro
      WHERE relaciones.id_centro = :id_centro
      AND relaciones.id_curso = :id_curso
      ORDER BY asignaturas.asignatura asc
    ';
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute(['id_centro' => $idCentro,'id_curso' => $idCurso]);
    $datos3 = $stmt3->fetchAll();

    //dump($datos3);

       return $this->render('home/includes/listAsignaturasById.html.twig', [
          'asignaturas' => $datos3,
       ]);

  }

  //**

  public function temasAsignaturas($idRelaciones)
  {

    $entityManager = $this->getDoctrine()->getManager();
    $conn = $entityManager->getConnection();

    $sql4 = '
    SELECT temas.tema, temas.slug as slug_tema, asignaturas.slug as slug_asignatura, cursos.slug as slug_curso, centros.slug as slug_centro
      FROM temas
      INNER JOIN relaciones ON relaciones.id = temas.id_relaciones
      INNER JOIN asignaturas ON asignaturas.id_asignatura = relaciones.id_asignatura
      LEFT JOIN cursos ON relaciones.id_curso = cursos.id_curso
      LEFT JOIN centros ON relaciones.id_centro = centros.id_centro
      WHERE temas.id_relaciones = :id_relaciones
      ORDER BY temas.tema asc
    ';
    $stmt4 = $conn->prepare($sql4);
    $stmt4->execute(['id_relaciones' => $idRelaciones]);
    $datos4 = $stmt4->fetchAll();

    //dump($sql4);

       return $this->render('home/includes/listTemasById.html.twig', [
          'temas' => $datos4,
       ]);

  }

  //**


  /**
   * @Route("/{centro}", name="centro", requirements={"centro": "pintor-rosales|ramiro-de-maeztu"}))
   */
  public function centro($centro): Response
  {
    $repo_centros = $this->getDoctrine()->getRepository(Centros::class);
    $paso_centro = $repo_centros->findOneBy(['slug' => $centro]);

      return $this->render('home/centro.html.twig', [
          'controller_name' => 'HomeController',
          'centro' => $paso_centro
      ]);
  }



    /**
     * @Route("/{centro}/{curso}", name="curso")
     */
    public function curso($centro, $curso): Response
    {
      $repo_centros = $this->getDoctrine()->getRepository(Centros::class);
      $paso_centro = $repo_centros->findOneBy(['slug' => $centro]);

      $repo_cursos = $this->getDoctrine()->getRepository(Cursos::class);
      $paso_curso = $repo_cursos->findOneBy(['slug' => $curso]);


        return $this->render('home/curso.html.twig', [
            'controller_name' => 'HomeController',
            'centro' => $paso_centro,
            'curso' => $paso_curso
        ]);
    }


        /**
         * @Route("/{centro}/{curso}/{asignatura}", name="asignatura")
         */
        public function asignatura($centro, $curso, $asignatura): Response
        {
          $repo_centros = $this->getDoctrine()->getRepository(Centros::class);
          $paso_centro = $repo_centros->findOneBy(['slug' => $centro]);

          $repo_cursos = $this->getDoctrine()->getRepository(Cursos::class);
          $paso_curso = $repo_cursos->findOneBy(['slug' => $curso]);

          $repo_asignaturas = $this->getDoctrine()->getRepository(Asignaturas::class);
          $paso_asignatura = $repo_asignaturas->findOneBy(['slug' => $asignatura]);

          //relaciones
          $entityManager = $this->getDoctrine()->getManager();
          $conn = $entityManager->getConnection();

          $sql5 = '
          SELECT relaciones.id
            FROM relaciones
            INNER JOIN asignaturas ON relaciones.id_asignatura = asignaturas.id_asignatura
            INNER JOIN cursos ON relaciones.id_curso = cursos.id_curso
            INNER JOIN centros ON relaciones.id_centro = centros.id_centro
            WHERE centros.slug = :centro
            AND cursos.slug = :curso
            AND asignaturas.slug = :asignatura
          ';
          $stmt5 = $conn->prepare($sql5);
          $stmt5->execute(['centro' => $centro,
                          'curso' => $curso,
                          'asignatura' => $asignatura]);
          $idRelac = $stmt5->fetchAll();
          //

          //dump($idRelac);

            return $this->render('home/asignatura.html.twig', [
                'controller_name' => 'HomeController',
                'centro' => $paso_centro,
                'curso' => $paso_curso,
                'asignatura' => $paso_asignatura,
                'idRelac' => $idRelac
            ]);
        }

}
