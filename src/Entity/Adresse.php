<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdresseRepository")
 */
class Adresse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client" , inversedBy="adresses")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_client;

    public function __construct()
    {
        $this->adresses = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="id_adresse")
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
            $commande->setIdAdresse($this);
        }
        

        return $this;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rueEtNumero;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getRueEtNumero(): ?string
    {
        return $this->rueEtNumero;
    }

    public function setRueEtNumero(string $rueEtNumero): self
    {
        $this->rueEtNumero = $rueEtNumero;

        return $this;
    }

    public function getIdClient(): ?client
    {
        return $this->id_client;
    }

    public function setIdClient(?client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }
}
