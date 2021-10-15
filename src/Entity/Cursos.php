<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cursos
 *
 * @ORM\Table(name="cursos")
 * @ORM\Entity
 */
class Cursos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_curso", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCurso;

    /**
     * @var bool
     *
     * @ORM\Column(name="orden", type="boolean", nullable=false)
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="curso", type="string", length=20, nullable=false)
     */
    private $curso;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
    }

    public function getOrden(): ?bool
    {
        return $this->orden;
    }

    public function setOrden(bool $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }


}
