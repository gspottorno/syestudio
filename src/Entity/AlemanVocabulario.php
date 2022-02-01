<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlemanVocabulario
 *
 * @ORM\Table(name="aleman_vocabulario")
 * @ORM\Entity
 */
class AlemanVocabulario
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
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default"="1"})
     */
    private $activo = true;

    /**
     * @var string
     *
     * @ORM\Column(name="seccion", type="string", length=255, nullable=false)
     */
    private $seccion;

    /**
     * @var string
     *
     * @ORM\Column(name="espanol", type="string", length=255, nullable=false)
     */
    private $espanol;

    /**
     * @var string
     *
     * @ORM\Column(name="aleman", type="string", length=255, nullable=false)
     */
    private $aleman;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getSeccion(): ?string
    {
        return $this->seccion;
    }

    public function setSeccion(string $seccion): self
    {
        $this->seccion = $seccion;

        return $this;
    }

    public function getEspanol(): ?string
    {
        return $this->espanol;
    }

    public function setEspanol(string $espanol): self
    {
        $this->espanol = $espanol;

        return $this;
    }

    public function getAleman(): ?string
    {
        return $this->aleman;
    }

    public function setAleman(string $aleman): self
    {
        $this->aleman = $aleman;

        return $this;
    }


}
