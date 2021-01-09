<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Form\Type\ArticleType;


class ListeArticlesController extends AbstractController
{
    /**
     * @Route("/listeArticles", name="liste_articles")
     */
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();

        return $this->render('articles/listeArticles.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteArticle(Article $article): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('liste_articles');
    }
}