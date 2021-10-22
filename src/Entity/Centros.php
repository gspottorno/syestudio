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
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=255, nullable=false)
     */
    private $web;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=150, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=25, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="ampa", type="string", length=255, nullable=false)
     */
    private $ampa;

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

    /**
     * @var string
     *
     * @ORM\Column(name="maps", type="text", length=65535, nullable=false)
     */
    private $maps;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getAmpa(): ?string
    {
        return $this->ampa;
    }

    public function setAmpa(string $ampa): self
    {
        $this->ampa = $ampa;

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

    public function getMaps(): ?string
    {
        return $this->maps;
    }

    public function setMaps(string $maps): self
    {
        $this->maps = $maps;

        return $this;
    }


}
