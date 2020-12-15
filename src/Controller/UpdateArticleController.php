<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class UpdateArticleController extends AbstractController
{
    /**
     * @Route("/article/update", name="update")
     */
    public function index(): Response
    {
        return $this->render('articles/update/updateArticle.html.twig', [
            'controller_name' => 'UpdateArticleController',
        ]);
    }
    public function updateArticle(int $id, Article $newArticle): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $article = $entityManager->getRepository(User::class)->find($id);
        $article->setTitle($newArticle->getTitle());
        $article->setIdUser($newArticle->getIdUser());
        $article->setContent($newArticle->getContent());
        $article->setCreatedAt($newArticle->getCreatedAt());
        $entityManager->flush();
        return new Response('Article modifié avec succés !');
    }
}
