<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CadreRepository")
 */
class Cadre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

         /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="cadre")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagecadre;

    /**
     * @ORM\Column(type="float")
     */
    private $prixCadreUniteHt;
   
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Couleur", inversedBy="cadres")
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Matiere", inversedBy="cadres")
     */
    private $matiere;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nomcadre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagecadre(): ?string
    {
        return $this->imagecadre;
    }

    public function setImagecadre(string $imagecadre): self
    {
        $this->imagecadre = $imagecadre;

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

    public function getPrixCadreUniteHt(): ?float
    {
        return $this->prixCadreUniteHt;
    }

    public function setPrixCadreUniteHt(float $prixcadreuniteht): self
    {
        $this->prixCadreUniteHt = $prixcadreuniteht;

        return $this;
    }


    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }
   
    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }
    
      /**
     * @return Collection|Produit[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setCadre($this);
        }
        

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->cadres->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getCadre() === $this) {
                $produit->setCadre(null);
            }
        }

        return $this;
    }

    public function getNomcadre(): ?string
    {
        return $this->nomcadre;
    }

    public function setNomcadre(string $nomcadre): self
    {
        $this->nomcadre = $nomcadre;

        return $this;
    }
}
