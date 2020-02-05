<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
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
    private $referencecommande;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $etatcommande;//

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecommande;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datelivraison;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Adresse", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_adresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Typelivraison", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_typelivraison;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Typepaiement", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_typepaiement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_client;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferencecommande(): ?string
    {
        return $this->referencecommande;
    }

    public function setReferencecommande(string $referencecommande): self
    {
        $this->referencecommande = $referencecommande;

        return $this;
    }

    public function getEtatcommande(): ?string
    {
        return $this->etatcommande;
    }

    public function setEtatcommande(string $etatcommande): self
    {
        $this->etatcommande = $etatcommande;

        return $this;
    }

    public function getDatecommande(): ?\DateTimeInterface
    {
        return $this->datecommande;
    }

    public function setDatecommande(\DateTimeInterface $datecommande): self
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    public function getDatelivraison(): ?\DateTimeInterface
    {
        return $this->datelivraison;
    }

    public function setDatelivraison(?\DateTimeInterface $datelivraison): self
    {
        $this->datelivraison = $datelivraison;

        return $this;
    }

    public function getIdAdresse(): ?adresse
    {
        return $this->id_adresse;
    }

    public function setIdAdresse(?adresse $id_adresse): self
    {
        $this->id_adresse = $id_adresse;

        return $this;
    }

    public function getIdTypelivraison(): ?typelivraison
    {
        return $this->id_typelivraison;
    }

    public function setIdTypelivraison(?typelivraison $id_typelivraison): self
    {
        $this->id_typelivraison = $id_typelivraison;

        return $this;
    }

    public function getIdTypepaiement(): ?typepaiement
    {
        return $this->id_typepaiement;
    }

    public function setIdTypepaiement(?typepaiement $id_typepaiement): self
    {
        $this->id_typepaiement = $id_typepaiement;

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
