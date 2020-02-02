<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="id_typelivraison")
     */
    private $commandes;

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setIdTypelivraison($this);
        }
        

        return $this;
    }

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
