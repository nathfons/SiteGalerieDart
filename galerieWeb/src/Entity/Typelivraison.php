<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypelivraisonRepository")
 */
class Typelivraison
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
    private $nomtypelivraison;

    /**
     * @ORM\Column(type="float")
     */
    private $prixlivraison;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomtypelivraison(): ?string
    {
        return $this->nomtypelivraison;
    }

    public function setNomtypelivraison(string $nomtypelivraison): self
    {
        $this->nomtypelivraison = $nomtypelivraison;

        return $this;
    }

    public function getPrixlivraison(): ?float
    {
        return $this->prixlivraison;
    }

    public function setPrixlivraison(float $prixlivraison): self
    {
        $this->prixlivraison = $prixlivraison;

        return $this;
    }
}
