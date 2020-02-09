<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotographieArtisteRepository")
 */
class PhotographieArtiste
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photographie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $miniature;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiste", inversedBy="idPhotographie")
     */
    private $artiste;

    public function getId(): ?int
    {
        return $this->id;
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
}
