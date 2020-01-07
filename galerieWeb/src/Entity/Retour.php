<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RetourRepository")
 */
class Retour
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCommande;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateRetour;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRemboursement;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiteRetour;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $referenceRetour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?Commande $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(\DateTimeInterface $dateRetour): self
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getDateRemboursement(): ?\DateTimeInterface
    {
        return $this->dateRemboursement;
    }

    public function setDateRemboursement(?\DateTimeInterface $dateRemboursement): self
    {
        $this->dateRemboursement = $dateRemboursement;

        return $this;
    }

    public function getQuantiteRetour(): ?int
    {
        return $this->quantiteRetour;
    }

    public function setQuantiteRetour(int $quantiteRetour): self
    {
        $this->quantiteRetour = $quantiteRetour;

        return $this;
    }

    public function getReferenceRetour(): ?string
    {
        return $this->referenceRetour;
    }

    public function setReferenceRetour(string $referenceRetour): self
    {
        $this->referenceRetour = $referenceRetour;

        return $this;
    }
}
