<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ListeArticlesController extends AbstractController
{
    /**
     * @IsGranted("ROLE_MODO")
     * @Route("/listeArticles", name="liste_articles")
     */
    public function index(ArticleRepository $repo,  Request $request, PaginatorInterface $paginator): Response
    {
        $donnees = $repo->findAll();
        $articles = $paginator->paginate(
            $donnees, //On passe les données
            $request->query->getInt('page', 1),//Numéro de la page en cours, 1 par défaut
            6 // Nombre d'articles par page
        );

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