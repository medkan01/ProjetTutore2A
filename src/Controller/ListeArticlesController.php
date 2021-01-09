<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeArticlesController extends AbstractController
{
    /**
     * @Route("/liste/articles", name="liste_articles")
     */
    public function index(): Response
    {
        return $this->render('liste_articles/index.html.twig', [
            'controller_name' => 'ListeArticlesController',
        ]);
    }
}
