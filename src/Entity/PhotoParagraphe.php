<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoParagrapheRepository")
 */
class PhotoParagraphe
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Paragraphe", inversedBy="id_photo")
     */
    private $paragraphe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paragraphe", mappedBy="photo")
     */
    private $paragraphes;

    public function __construct()
    {
        $this->paragraphes = new ArrayCollection();
    }

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

    public function getParagraphe(): ?Paragraphe
    {
        return $this->paragraphe;
    }

    public function setParagraphe(?Paragraphe $paragraphe): self
    {
        $this->paragraphe = $paragraphe;

        return $this;
    }

    /**
     * @return Collection|Paragraphe[]
     */
    public function getParagraphes(): Collection
    {
        return $this->paragraphes;
    }

    public function addParagraphe(Paragraphe $paragraphe): self
    {
        if (!$this->paragraphes->contains($paragraphe)) {
            $this->paragraphes[] = $paragraphe;
            $paragraphe->setPhoto($this);
        }

        return $this;
    }

    public function removeParagraphe(Paragraphe $paragraphe): self
    {
        if ($this->paragraphes->contains($paragraphe)) {
            $this->paragraphes->removeElement($paragraphe);
            // set the owning side to null (unless already changed)
            if ($paragraphe->getPhoto() === $this) {
                $paragraphe->setPhoto(null);
            }
        }

        return $this;
    }
}
