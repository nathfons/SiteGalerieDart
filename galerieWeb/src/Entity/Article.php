<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $titre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publie;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datePublication;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFinPublication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoTitre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paragraphe", mappedBy="article")
     */
    private $paragraphes;

    

    public function __construct()
    {
        $this->idParagraphe = new ArrayCollection();
        $this->paragraphes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPublie(): ?bool
    {
        return $this->publie;
    }

    public function setPublie(bool $publie): self
    {
        $this->publie = $publie;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(?\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getDateFinPublication(): ?\DateTimeInterface
    {
        return $this->dateFinPublication;
    }

    public function setDateFinPublication(?\DateTimeInterface $dateFinPublication): self
    {
        $this->dateFinPublication = $dateFinPublication;

        return $this;
    }

    public function getPhotoTitre(): ?string
    {
        return $this->photoTitre;
    }

    public function setPhotoTitre(string $photoTitre): self
    {
        $this->photoTitre = $photoTitre;

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
            $paragraphe->setArticle($this);
        }

        return $this;
    }

    public function removeParagraphe(Paragraphe $paragraphe): self
    {
        if ($this->paragraphes->contains($paragraphe)) {
            $this->paragraphes->removeElement($paragraphe);
            // set the owning side to null (unless already changed)
            if ($paragraphe->getArticle() === $this) {
                $paragraphe->setArticle(null);
            }
        }

        return $this;
    }

    
}
