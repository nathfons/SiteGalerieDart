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
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="paragraphes")
     */
    private $article;

   

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PhotoParagraphe", inversedBy="paragraphes",cascade={"persist"})
     */
    private $photo;

    
    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

   
    public function getPhoto(): ?PhotoParagraphe
    {
        return $this->photo;
    }

    public function setPhoto(?PhotoParagraphe $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

   
}
