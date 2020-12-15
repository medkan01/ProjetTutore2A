<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class NewArticleController extends AbstractController
{
    /**
     * @Route("/article/insert", name="insert")
     */
    public function index(): Response
    {
        return $this->render('insert/insertArticle.html.twig', [
            'controller_name' => 'NewArticleController',
        ]);
    }

    public function createArticle(Article $article): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();
        return new Response('Nouvel article créé avec l\'id: '.$article->getId());
    }
}
