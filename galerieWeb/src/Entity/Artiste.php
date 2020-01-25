<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtisteRepository")
 */
class Artiste
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $biography;

    /**
     * @ORM\Column(type="boolean")
     */
    private $approuve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photographie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $miniature;

    /**
     * @ORM\Column(type="float")
     */
    private $commission;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alaune;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textAlaune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreationCompte;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PhotographieArtiste", mappedBy="artiste")
     */
    private $idPhotographie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="artiste")
     */
    private $produits;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Utilisateur", cascade={"persist", "remove"})
     */
    private $idUtilisateur;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $categorie;

    public function __construct()
    {
        $this->idPhotographie = new ArrayCollection();
        $this->idProduit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getApprouve(): ?bool
    {
        return $this->approuve;
    }

    public function setApprouve(bool $approuve): self
    {
        $this->approuve = $approuve;

        return $this;
    }

    public function getPhotographie(): ?string
    {
        return $this->photographie;
    }

    public function setPhotographie(?string $photographie): self
    {
        $this->photographie = $photographie;

        return $this;
    }

    public function getMiniature(): ?string
    {
        return $this->miniature;
    }

    public function setMiniature(?string $miniature): self
    {
        $this->miniature = $miniature;

        return $this;
    }

    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(float $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getAlaune(): ?bool
    {
        return $this->alaune;
    }

    public function setAlaune(bool $alaune): self
    {
        $this->alaune = $alaune;

        return $this;
    }

    public function getTextAlaune(): ?string
    {
        
        return $this->textAlaune;
    }

    public function setTextAlaune(?string $textAlaune): self
    {
        $this->textAlaune = $textAlaune;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateCreationCompte(): ?\DateTimeInterface
    {
        return $this->dateCreationCompte;
    }

    public function setDateCreationCompte(\DateTimeInterface $dateCreationCompte): self
    {
        $this->dateCreationCompte = $dateCreationCompte;

        return $this;
    }

    /**
     * @return Collection|PhotographieArtiste[]
     */
    public function getIdPhotographie(): Collection
    {
        return $this->idPhotographie;
    }

    public function addIdPhotographie(PhotographieArtiste $idPhotographie): self
    {
        if (!$this->idPhotographie->contains($idPhotographie)) {
            $this->idPhotographie[] = $idPhotographie;
            $idPhotographie->setArtiste($this);
        }

        return $this;
    }

    public function removeIdPhotographie(PhotographieArtiste $idPhotographie): self
    {
        if ($this->idPhotographie->contains($idPhotographie)) {
            $this->idPhotographie->removeElement($idPhotographie);
            // set the owning side to null (unless already changed)
            if ($idPhotographie->getArtiste() === $this) {
                $idPhotographie->setArtiste(null);
            }
        }

        return $this;
    }

    
    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        

        return $this;
    }

       /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setArtiste($this);
        }
        

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->cadres->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getArtiste() === $this) {
                $produit->setArtiste(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
