<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticlesController extends AbstractController
{
    /**
     *  @IsGranted("ROLE_MODO")
     * @Route("/articles", name="articles")
     */
    
    public function index(ArticleRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $donnees = $repo->findAll();
        $articles = $paginator->paginate(
            $donnees, //On passe les données
            $request->query->getInt('page', 1),//Numéro de la page en cours, 1 par défaut
            6 // Nombre d'articles par page
        );
        return $this->render('articles/articles.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articles
        ]);
    }
}

