<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centros
 *
 * @ORM\Table(name="centros")
 * @ORM\Entity
 */
class Centros
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_centro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCentro;

    /**
     * @var string
     *
     * @ORM\Column(name="centro", type="string", length=255, nullable=false)
     */
    private $centro;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=15, nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="municipio", type="string", length=255, nullable=false)
     */
    private $municipio;

    public function getIdCentro(): ?int
    {
        return $this->idCentro;
    }

    public function getCentro(): ?string
    {
        return $this->centro;
    }

    public function setCentro(string $centro): self
    {
        $this->centro = $centro;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(string $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }


}
