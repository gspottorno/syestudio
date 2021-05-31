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
     * @var string
     *
     * @ORM\Column(name="curso", type="string", length=20, nullable=false)
     */
    private $curso;

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
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


}
