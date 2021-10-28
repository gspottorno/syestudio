<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InglesIrregularVerbs
 *
 * @ORM\Table(name="ingles_irregular_verbs")
 * @ORM\Entity
 */
class InglesIrregularVerbs
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
     * @ORM\Column(name="infinitive", type="string", length=150, nullable=false)
     */
    private $infinitive;

    /**
     * @var string
     *
     * @ORM\Column(name="simple_past", type="string", length=150, nullable=false)
     */
    private $simplePast;

    /**
     * @var string
     *
     * @ORM\Column(name="past_participle", type="string", length=150, nullable=false)
     */
    private $pastParticiple;

    /**
     * @var string
     *
     * @ORM\Column(name="spanish", type="string", length=150, nullable=false)
     */
    private $spanish;

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

    public function getInfinitive(): ?string
    {
        return $this->infinitive;
    }

    public function setInfinitive(string $infinitive): self
    {
        $this->infinitive = $infinitive;

        return $this;
    }

    public function getSimplePast(): ?string
    {
        return $this->simplePast;
    }

    public function setSimplePast(string $simplePast): self
    {
        $this->simplePast = $simplePast;

        return $this;
    }

    public function getPastParticiple(): ?string
    {
        return $this->pastParticiple;
    }

    public function setPastParticiple(string $pastParticiple): self
    {
        $this->pastParticiple = $pastParticiple;

        return $this;
    }

    public function getSpanish(): ?string
    {
        return $this->spanish;
    }

    public function setSpanish(string $spanish): self
    {
        $this->spanish = $spanish;

        return $this;
    }


}
