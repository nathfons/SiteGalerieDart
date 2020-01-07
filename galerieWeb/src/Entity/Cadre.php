<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255)
     */
    private $imagecadre;

    /**
     * @ORM\Column(type="float")
     */
    private $prixCadreHt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\couleur")
     */
    private $idCouleur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idMatiere;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="idCadre")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

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

    public function getPrixCadreHt(): ?float
    {
        return $this->PrixCadreHt;
    }

    public function setPrixCadreHt(float $prixcadreht): self
    {
        $this->PrixCadreHt = $prixcadreht;

        return $this;
    }

    public function getIdCouleur(): ?couleur
    {
        return $this->id_couleur;
    }

    public function setIdCouleur(?couleur $id_couleur): self
    {
        $this->id_couleur = $id_couleur;

        return $this;
    }

    public function getIdMatiere(): ?matiere
    {
        return $this->id_matiere;
    }

    public function setIdMatiere(?matiere $id_matiere): self
    {
        $this->id_matiere = $id_matiere;

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
            $produit->setIdCadre($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getIdCadre() === $this) {
                $produit->setIdCadre(null);
            }
        }

        return $this;
    }
}
