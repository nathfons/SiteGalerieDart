<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paragraphe", mappedBy="articles")
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
            $paragraphe->setArticles($this);
        }

        return $this;
    }

    public function removeParagraphe(Paragraphe $paragraphe): self
    {
        if ($this->paragraphes->contains($paragraphe)) {
            $this->paragraphes->removeElement($paragraphe);
            // set the owning side to null (unless already changed)
            if ($paragraphe->getArticles() === $this) {
                $paragraphe->setArticles(null);
            }
        }

        return $this;
    }
}
