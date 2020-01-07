<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomFacture;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $referenceFacture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFacture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\adresse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idAdresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFacture(): ?string
    {
        return $this->nomFacture;
    }

    public function setNomFacture(string $nomFacture): self
    {
        $this->nomFacture = $nomFacture;

        return $this;
    }

    public function getReferenceFacture(): ?string
    {
        return $this->referenceFacture;
    }

    public function setReferenceFacture(string $referenceFacture): self
    {
        $this->referenceFacture = $referenceFacture;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): self
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getIdAdresse(): ?adresse
    {
        return $this->idAdresse;
    }

    public function setIdAdresse(?adresse $idAdresse): self
    {
        $this->idAdresse = $idAdresse;

        return $this;
    }

    public function getIdCommande(): ?commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?commande $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }
}
