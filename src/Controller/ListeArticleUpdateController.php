<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ListeArticleUpdateController extends AbstractController
{
    /**
     * @Route("/liste/article/update", name="liste_article_update")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render('articles/update/listeUpdateArticle.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articles
        ]);
    }
}
