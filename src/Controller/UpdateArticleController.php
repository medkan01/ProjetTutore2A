<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\Type\ArticleType;

class UpdateArticleController extends AbstractController
{
    /**
     * @Route("/articles/update", name="update")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render('articles/update/updateArticle.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articles
       ]);
    }

     /**
     * @Route("/articles/update/{id}", name="article_update")
     */
    public function updateArticle(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        //Il faut que Mehdi ajoute les vérifications pour que l'article ajouté soit correct et ne créer pas d'erreur(s) dans la bdd
        if($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }
    }
}