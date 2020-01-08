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
     * @ORM\OneToMany(targetEntity="App\Entity\PhotoParagraphe", mappedBy="paragraphe")
     */
    private $id_photo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="idParagraphe")
     */
    private $article;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu;

    public function __construct()
    {
        $this->id_photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
}
