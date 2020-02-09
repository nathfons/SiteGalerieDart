<?php

namespace App\Service\Commande;

use App\Repository\UtilisateurRepository;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Security;

class CommandeService{


    protected  $session;
    protected $repositoryUtilisateur;

    public function __construct(SessionInterface $session,UtilisateurRepository $repositoryUtilisateur)
    {
        $this->session = $session;
        $this->repositoryUtilisateur = $repositoryUtilisateur;
    }
    


     public function getUser(): ?Utilisateur{

        $email=$this->session->get(Security::LAST_USERNAME,"");

        return $this->repositoryUtilisateur->findOneByEmail($email);
    }

}