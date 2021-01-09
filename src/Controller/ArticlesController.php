<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(ArticleRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $donnees = $repo->findAll();
        $articles = $paginator->paginate(
            $donnees, //On passe les données
            $request->query->getInt('page', 1),//Numéro de la page en cours, 1 par défaut
            2 // Nombre d'articles par page
        );
        return $this->render('articles/articles.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articles
        ]);
    }
}
