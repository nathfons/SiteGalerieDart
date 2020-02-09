<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\ArtistesList;
use App\Form\ArtistesListType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/artisteslist")
 */

class ArtistesListController extends AbstractController
{

    /**
     * @Route("/artistes_alaune", name="artistes_alaune")
     */
    public function alaune(Request $request)
    {
        $artistesList = new ArtistesList();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        //$tag1 = new Tag();
        //$tag1->setName('tag1');
        //$task->getTags()->add($tag1);
        
        // end dummy code

        $form = $this->createForm(ArtistesListType::class, $artistesList);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artistes_alaune');
        }

        return $this->render('artisteslist/alaune.html.twig', [
            'artistes' =>$artistesList,
            'form' => $form->createView(),
        ]);
    }
}

