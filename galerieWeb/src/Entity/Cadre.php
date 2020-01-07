<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=50)
     */
    private $dimension;

    /**
     * @ORM\Column(type="float")
     */
    private $prixcadreht;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\couleur")
     */
    private $id_couleur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_matiere;

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

    public function getPrixcadreht(): ?float
    {
        return $this->prixcadreht;
    }

    public function setPrixcadreht(float $prixcadreht): self
    {
        $this->prixcadreht = $prixcadreht;

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
}
