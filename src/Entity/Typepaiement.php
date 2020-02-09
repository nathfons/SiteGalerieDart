<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="id_typepaiement")
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
            $commande->setIdTypepaiement($this);
        }
        

        return $this;
    }

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
