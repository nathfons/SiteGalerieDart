<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypepaiementRepository")
 */
class Typepaiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nomtypepaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomtypepaiement(): ?string
    {
        return $this->nomtypepaiement;
    }

    public function setNomtypepaiement(string $nomtypepaiement): self
    {
        $this->nomtypepaiement = $nomtypepaiement;

        return $this;
    }
}
