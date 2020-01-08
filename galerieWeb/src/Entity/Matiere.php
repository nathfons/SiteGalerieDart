<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cadre", mappedBy="matiere")
     */
    private $cadres;

    public function __construct()
    {
        $this->cadres = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nommatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNommatiere(): ?string
    {
        return $this->nommatiere;
    }

    public function setNommatiere(string $nommatiere): self
    {
        $this->nommatiere = $nommatiere;

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
}
