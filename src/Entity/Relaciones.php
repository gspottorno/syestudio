<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relaciones
 *
 * @ORM\Table(name="relaciones", indexes={@ORM\Index(name="fk_relaciones_cursos", columns={"id_curso"}), @ORM\Index(name="fk_relaciones_asignaturas", columns={"id_asignatura"}), @ORM\Index(name="fk_relaciones_centros", columns={"id_centro"})})
 * @ORM\Entity
 */
class Relaciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Asignaturas
     *
     * @ORM\ManyToOne(targetEntity="Asignaturas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id_asignatura")
     * })
     */
    private $idAsignatura;

    /**
     * @var \Centros
     *
     * @ORM\ManyToOne(targetEntity="Centros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_centro", referencedColumnName="id_centro")
     * })
     */
    private $idCentro;

    /**
     * @var \Cursos
     *
     * @ORM\ManyToOne(targetEntity="Cursos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_curso", referencedColumnName="id_curso")
     * })
     */
    private $idCurso;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAsignatura(): ?Asignaturas
    {
        return $this->idAsignatura;
    }

    public function setIdAsignatura(?Asignaturas $idAsignatura): self
    {
        $this->idAsignatura = $idAsignatura;

        return $this;
    }

    public function getIdCentro(): ?Centros
    {
        return $this->idCentro;
    }

    public function setIdCentro(?Centros $idCentro): self
    {
        $this->idCentro = $idCentro;

        return $this;
    }

    public function getIdCurso(): ?Cursos
    {
        return $this->idCurso;
    }

    public function setIdCurso(?Cursos $idCurso): self
    {
        $this->idCurso = $idCurso;

        return $this;
    }


}
