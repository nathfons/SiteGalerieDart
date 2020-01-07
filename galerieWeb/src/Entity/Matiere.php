<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nommatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNommatiere(): ?string
    {
        return $this->nommatiere;
    }

    public function setNommatiere(string $nommatiere): self
    {
        $this->nommatiere = $nommatiere;

        return $this;
    }
}
