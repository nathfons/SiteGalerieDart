<?php

namespace App\Service\Commande;

use App\Repository\UtilisateurRepository;
use App\Entity\Utilisateur;
use App\Repository\CommandeRepository;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Security;

class CommandeService{


    protected  $session;
    protected $repositoryUtilisateur;
    protected $repositoryCommande;

    public function __construct(SessionInterface $session,UtilisateurRepository $repositoryUtilisateur,CommandeRepository $commandeRepository)
    {
        $this->session = $session;
        $this->repositoryUtilisateur = $repositoryUtilisateur;
    }
    


     public function getUser(): ?Utilisateur{

        $email=$this->session->get(Security::LAST_USERNAME,"");

        return $this->repositoryUtilisateur->findOneByEmail($email);
    }

    public function getCommande(): ?Commande{

        $idCommande=$this->session->get("commande",-1);
        if($idCommande == -1){return null;}
        return $this->repositoryCommande->find($idCommande);
    }

    public function setCommande(int $id): boolean{

        $this->session->set("commande",$id);

        return TRUE;
    }

}