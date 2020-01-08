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
    
}
