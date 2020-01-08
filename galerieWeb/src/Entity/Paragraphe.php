<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParagrapheRepository")
 */
class Paragraphe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PhotoParagraphe", mappedBy="paragraphe")
     */
    private $id_photo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="idParagraphe")
     */
    private $article;

    public function __construct()
    {
        $this->id_photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?text
    {
        return $this->text;
    }

    public function setText(?text $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|PhotoParagraphe[]
     */
    public function getIdPhoto(): Collection
    {
        return $this->id_photo;
    }

    public function addIdPhoto(PhotoParagraphe $idPhoto): self
    {
        if (!$this->id_photo->contains($idPhoto)) {
            $this->id_photo[] = $idPhoto;
            $idPhoto->setParagraphe($this);
        }

        return $this;
    }

    public function removeIdPhoto(PhotoParagraphe $idPhoto): self
    {
        if ($this->id_photo->contains($idPhoto)) {
            $this->id_photo->removeElement($idPhoto);
            // set the owning side to null (unless already changed)
            if ($idPhoto->getParagraphe() === $this) {
                $idPhoto->setParagraphe(null);
            }
        }

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
