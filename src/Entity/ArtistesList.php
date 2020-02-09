<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ArtistesList
{
    

    protected $artistesList;

    public function __construct()
    {
        $this->artistesList = new ArrayCollection();
    }

    public function getArtistesList()
    {
        return $this->artistesList;
    }
}