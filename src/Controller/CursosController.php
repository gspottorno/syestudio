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
use App\Entity\Relaciones;

class CursosController extends AbstractController
{


/**
* @Route("/centros/{name}", name="centros")
*/
public function centros(Request $request): response
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

return $this->render('cursos/index.html.twig', [
    'controller_name' => 'CursosController',
    'title' => 'Cursos CEIP',
    'centros' => $centros,
    'page' => $page
]);

}





    /**
     * @Route("centros/cursos/asignatura/{$id}", name="asignatura_01")
     */
    public function asignatura_01(Request $request, Asignaturas $data)
    {
      $info = "mates! . $id";

      return $this->render('cursos/asignatura.html.twig', [
        'controller_name' => 'CursosController',
        'title' => 'Asignatura CEIP',
        'texto' => $info
      ]);

    }





//PRUEBAS *******************************************************************

/**
 * @Route("/cursos2", name="cursos2")
 */
public function index2(Request $request): response
{
   $page = $request->query->get('page', 1);

  $entityManager = $this->getDoctrine()->getManager();
  $conn = $entityManager->getConnection();

  //Centro
  $sql = '
  SELECT centros.id_centro, centros.centro
    FROM centros
    ORDER BY centros.centro asc
  ';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $datos = $stmt->fetchAll();
  dump($datos);

  //Curso
  $sql2 = '
  SELECT cursos.id_curso, cursos.curso, relaciones.id_centro
    FROM cursos
    INNER JOIN relaciones ON relaciones.id_curso = cursos.id_curso
    GROUP BY cursos.id_curso
    ORDER BY cursos.orden asc
  ';
  $stmt2 = $conn->prepare($sql2);
  $stmt2->execute();
  $datos2 = $stmt2->fetchAll();

  //dump($datos2);

  //Asignaturas
  $sql3 = '
  SELECT asignaturas.id_asignatura, asignaturas.asignatura, relaciones.id_centro, relaciones.id_curso
    FROM asignaturas
    INNER JOIN relaciones ON relaciones.id_asignatura = asignaturas.id_asignatura
    GROUP BY asignaturas.asignatura
    ORDER BY asignaturas.asignatura desc
  ';
  $stmt3 = $conn->prepare($sql3);
  $stmt3->execute();
  $datos3 = $stmt3->fetchAll();
  dump($datos3);

  return $this->render('cursos/index.html.twig', [
      'controller_name' => 'CursosController',
      'title' => 'Cursos CEIP',
      'page' => $page,
      'centros' => $datos,
      'cursos' => $datos2,
      'asig' => $datos3
  ]);

}


        /**
        * @Route("/lucky/number/{max}", name="app_lucky_number")
        */
       public function number(int $max): Response
       {
           $number = random_int(0, $max);

           return new Response(
               '<html><body>Lucky number: '.$number.'</body></html>'
           );
       }

}
