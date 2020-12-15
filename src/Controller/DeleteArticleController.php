<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class DeleteArticleController extends AbstractController
{
    /**
     * @Route("/article/delete", name="delete")
     */
    public function index(): Response
    {
        return $this->render('delete/deleteArticle.html.twig', [
            'controller_name' => 'DeleteArticleController',
        ]);
    }
    public function createArticle(Article $article): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return new Response('Article supprimé avec succés !');
    }
}
