<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouleurRepository")
 */
class Couleur
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
    private $nomcouleur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcouleur(): ?string
    {
        return $this->nomcouleur;
    }

    public function setNomcouleur(string $nomcouleur): self
    {
        $this->nomcouleur = $nomcouleur;

        return $this;
    }
}
