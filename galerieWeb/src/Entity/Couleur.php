<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouleurRepository")
 */
class Couleur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cadre", mappedBy="couleur")
     */
    private $cadres;

    public function __construct()
    {
        $this->cadres = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nomcouleur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcouleur(): ?string
    {
        return $this->nomcouleur;
    }

    public function setNomcouleur(string $nomcouleur): self
    {
        $this->nomcouleur = $nomcouleur;

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

       /**
     * @return Collection|Cadre[]
     */
    public function getCadres(): Collection
    {
        return $this->cadres;
    }

    public function addCadre(Cadre $cadre): self
    {
        if (!$this->cadre->contains($cadre)) {
            $this->cadres[] = $cadre;
            $cadre->setCouleur($this);
        }

        return $this;
    }

    public function removeCadre(Cadre $cadre): self
    {
        if ($this->cadres->contains($cadre)) {
            $this->cadres->removeElement($cadre);
            // set the owning side to null (unless already changed)
            if ($cadre->getCouleur() === $this) {
                $cadre->setCouleur(null);
            }
        }

        return $this;
    }
}
