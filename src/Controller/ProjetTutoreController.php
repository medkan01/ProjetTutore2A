<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetTutoreController extends AbstractController
{
    /**
     * @Route("/projet/tutore", name="projet_tutore")
     */
    public function index(): Response
    {
        return $this->render('projet_tutore/index.html.twig', [
            'controller_name' => 'ProjetTutoreController',
        ]);
    }

    /**
     * @Route("/", name="accueil");
     */
    public function accueil() : Response
    {
        return $this->render('projet_turore/accueil.html.twig',[
            'titre' => 'Bienvenue sur ProjetTutore'
        ]);
    }
}
