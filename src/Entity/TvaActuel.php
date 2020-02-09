<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TvaActuelRepository")
 */
class TvaActuel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tvaType;

    /**
     * @ORM\Column(type="float")
     */
    private $tva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTvaType(): ?string
    {
        return $this->tvaType;
    }

    public function setTvaType(string $tvaType): self
    {
        $this->tvaType = $tvaType;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }
}
