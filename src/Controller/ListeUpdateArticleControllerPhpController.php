<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeUpdateArticleControllerPhpController extends AbstractController
{
    /**
     * @Route("/liste/update/article/controller/php", name="liste_update_article_controller_php")
     */
    public function index(): Response
    {
        return $this->render('liste_update_article_controller_php/index.html.twig', [
            'controller_name' => 'ListeUpdateArticleControllerPhpController',
        ]);
    }
}
