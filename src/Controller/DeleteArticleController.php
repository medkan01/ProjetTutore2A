<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class DeleteArticleController extends AbstractController
{
    /**
     * @Route("/articles/delete", name="delete")
     */
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();

        return $this->render('articles/delete/deleteArticle.html.twig',[
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/articles/delete/{id}", name="article_delete")
     */
    public function deleteArticle(Article $article): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('delete');
    }
}
