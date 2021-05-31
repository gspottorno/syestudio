<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignaturas
 *
 * @ORM\Table(name="asignaturas")
 * @ORM\Entity
 */
class Asignaturas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_asignatura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="asignatura", type="string", length=200, nullable=false)
     */
    private $asignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="tema", type="string", length=150, nullable=false)
     */
    private $tema;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=100, nullable=false)
     */
    private $tabla;

    public function getIdAsignatura(): ?int
    {
        return $this->idAsignatura;
    }

    public function getAsignatura(): ?string
    {
        return $this->asignatura;
    }

    public function setAsignatura(string $asignatura): self
    {
        $this->asignatura = $asignatura;

        return $this;
    }

    public function getTema(): ?string
    {
        return $this->tema;
    }

    public function setTema(string $tema): self
    {
        $this->tema = $tema;

        return $this;
    }

    public function getTabla(): ?string
    {
        return $this->tabla;
    }

    public function setTabla(string $tabla): self
    {
        $this->tabla = $tabla;

        return $this;
    }


}
