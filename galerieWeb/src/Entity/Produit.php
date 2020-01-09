<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
    private $typeProduit;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomProduit;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dimension;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estCadre;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cadre", inversedBy="produits")
     */
    private $cadre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHT;

    /**
     * @ORM\Column(type="boolean")
     */
    private $approuve;

    /**
     * @ORM\Column(type="float")
     */
    private $remise;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enVente;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enStock;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantiteStocks;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantiteVendue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photographie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $miniature;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiste", inversedBy="produits")
     */
    private $artiste;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="produits")
     */
    //id du Produit de l'oeuvre originale
    private $produitoriginal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dimensionCadre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie" , inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeProduit(): ?string
    {
        return $this->typeProduit;
    }

    public function setTypeProduit(string $typeProduit): self
    {
        $this->typeProduit = $typeProduit;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    public function setDimension(string $dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function getCadre(): ?Cadre
    {
        return $this->cadre;
    }

    public function setCadre(?Cadre $cadre): self
    {
        $this->cadre = $cadre;

        return $this;
    }

    public function setProduitoriginal(?self $produitoriginal): self
    {
        $this->produitoriginal = $produitoriginal;

        return $this;
    }

    public function getProduitoriginal(): ?self
    {
        return $this->produitoriginal;
    }

    public function getPrixHT(): ?float
    {
        return $this->prixHT;
    }

    public function setPrixHT(?float $prixHT): self
    {
        $this->prixHT = $prixHT;

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

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getEnVente(): ?bool
    {
        return $this->enVente;
    }

    public function setEnVente(?bool $enVente): self
    {
        $this->enVente = $enVente;

        return $this;
    }

    public function getEnStock(): ?bool
    {
        return $this->enStock;
    }

    public function setEnStock(?bool $enStock): self
    {
        $this->enStock = $enStock;

        return $this;
    }

    public function getQuantiteStocks(): ?float
    {
        return $this->quantiteStocks;
    }

    public function setQuantiteStocks(?float $quantiteStocks): self
    {
        $this->quantiteStocks = $quantiteStocks;

        return $this;
    }

    public function getQuantiteVendue(): ?float
    {
        return $this->quantiteVendue;
    }

    public function setQuantiteVendue(?float $quantiteVendue): self
    {
        $this->quantiteVendue = $quantiteVendue;

        return $this;
    }

    public function getPhotographie(): ?string
    {
        return $this->photographie;
    }

    public function setPhotographie(string $photographie): self
    {
        $this->photographie = $photographie;

        return $this;
    }

    public function getMiniature(): ?string
    {
        return $this->miniature;
    }

    public function setMiniature(string $miniature): self
    {
        $this->miniature = $miniature;

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): self
    {
        $this->artiste = $artiste;

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
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setProduitOriginal($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getProduitOriginal() === $this) {
                $produit->setProduitOriginal(null);
            }
        }

        return $this;
    }

    public function getDimensionCadre(): ?string
    {
        return $this->dimensionCadre;
    }

    public function setDimensionCadre(string $dimensionCadre): self
    {
        $this->dimensionCadre = $dimensionCadre;

        return $this;
    }

    public function getEstCadre(): ?bool
    {
        return $this->estCadre;
    }

    public function setEstCadre(bool $estCadre): self
    {
        $this->estCadre = $estCadre;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getProduit(): ?produit
    {
        return $this->produit;
    }

    public function setProduit(?produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
