<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\ArtistesList;
use App\Form\ArtistesListType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ArtistesListController extends AbstractController
{
    public function new(Request $request)
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
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('/artistes/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
