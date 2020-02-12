<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Client;
use App\Constants\BDDconstants;
use App\Form\CommandeType;
use App\Form\CommandeType1;
use App\Form\ClientType;
use App\Form\ClientType2;
use App\Repository\CommandeRepository;
use App\Repository\ClientRepository;
use App\Service\Commande\CommandeService;
use App\Service\Panier\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



/**
 * Require ROLE_USER for *every* controller method in this class.
 *
 * @IsGranted("ROLE_USER")
 * @Route("/commande")
 */
class CommandeController extends AbstractController
{
    private $commande = null;
    /**
     * @Route("/", name="commande_index", methods={"GET"})
     */
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
            //dump( $commandeRepository->findAll()),
        ]);
    }

    /**
     * @Route("/detail", name="commande_detail", methods={"GET","POST"})
     */
    public function detail(Request $request,ClientRepository $clientRepository,CommandeRepository $commandeRepository,PanierService $servicePanier,CommandeService $serviceCommande): Response
    {
        $panierAvecDonnees = $servicePanier->getFullPanier();
        $total = $servicePanier->getTotal();
        $user=$serviceCommande->getUser();
        $client = null;
        if($this->commande==null){
            $this->commande = new Commande();// A COMPLETER
        }
        $this->getDoctrine()->getManager()->persist($this->commande);
        //$date =  DateTime::CreateFromFormat("Y-m-d-s");
        $date = new \DateTime("now");
        if($user != null){
            $client = $clientRepository->findOneByUserId($user->getId());

            if($client == null){
                $client = new Client();
                $client->setUtilisateur($user);
                $client->setDateCreationCompte($date);
                $this->getDoctrine()->getManager()->persist($client);
            }
            else{
               
            }
            $this->commande->setIdClient($client);
            $this->commande->setDatecommande($date);
            $this->commande->setEtatcommande(BDDconstants::COMMANDE_attente);
        }

        //$formClient = $this->createForm(ClientType2::class, $client);
        /*
        $formClient = $this->createForm(ClientType2::class, $client);
        $formClient->handleRequest($request);

        

        if ($formClient->isSubmitted() && $formClient->isValid()) {
            $commande->setReferencecommande('REF-C'.$date->format("Y-m-d\TH:i:sP").$client->getNom());
            foreach($client->getAdresses() as $adresse){
                $adresse->setIdClient($client);
            }
            $this->getDoctrine()->getManager()->flush();
        }
        */
    
        $form = $this->createForm(CommandeType1::class, $this->commande);
        $form->handleRequest($request);

        
       
            if ($form->isSubmitted() && $form->isValid()) {
                $this->commande->setReferencecommande('REF-C'.$date->format("Y-m-d\TH:i:sP").$client->getNom());

           
                foreach($client->getAdresses() as $adresse){
                    $adresse->setIdClient($client);
                }
                $commande->setIdClient($client);
                $this->getDoctrine()->getManager()->persist($this->commande);
               if( $this->commande->getIdAdresse()!=null){
                            $this->getDoctrine()->getManager()->flush();
                            $this->commande=null;
                            return $this->redirectToRoute('commande_paiement');
                        }else{
                            //Ajouter warning erreur pour utilisateur - adresse pas renseignée
                        }
                
            }
           
           

        return $this->render('commande/detail.html.twig', [
            'commande' => $commande,
            'client' => $client,
            'user' => $user,
            'achats' => $panierAvecDonnees,
            'total' => $total,
            'form' => $form->createView(),
            //'formClient' => $formClient->createView(),
        ]);
    }


    /**
     * @Route("/paiement", name="commande_paiement", methods={"GET","POST"})
     */
    public function paiement(Request $request,ClientRepository $clientRepository,CommandeRepository $commandeRepository,PanierService $servicePanier,CommandeService $serviceCommande): Response
    {
        $form = $this->createForm(PaiementType::class, $this->commande);
        $form->handleRequest($request);
        return $this->render('commande/paiement.html.twig', [
            'form' => $form->createView(),
            //'formClient' => $formClient->createView(),
        ]);
    }
    /**
     * @Route("/new", name="commande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commande);
            $entityManager->flush();

            return $this->redirectToRoute('commande_index');
        }

        return $this->render('commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commande_show", methods={"GET"})
     */
    public function show(Commande $commande): Response
    {
        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commande $commande): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commande_index');
        }

        return $this->render('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commande $commande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commande_index');
    }
}
