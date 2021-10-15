<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temas
 *
 * @ORM\Table(name="temas")
 * @ORM\Entity
 */
class Temas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tema", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTema;

    /**
     * @var int
     *
     * @ORM\Column(name="id_relaciones", type="integer", nullable=false)
     */
    private $idRelaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="tema", type="string", length=255, nullable=false)
     */
    private $tema;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", length=65535, nullable=false)
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="instrucciones", type="text", length=65535, nullable=false)
     */
    private $instrucciones;

    public function getIdTema(): ?int
    {
        return $this->idTema;
    }

    public function getIdRelaciones(): ?int
    {
        return $this->idRelaciones;
    }

    public function setIdRelaciones(int $idRelaciones): self
    {
        $this->idRelaciones = $idRelaciones;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    public function getInstrucciones(): ?string
    {
        return $this->instrucciones;
    }

    public function setInstrucciones(string $instrucciones): self
    {
        $this->instrucciones = $instrucciones;

        return $this;
    }


}
