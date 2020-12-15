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
     * @Route("/articles/update/liste", name="listeUpdate")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render('articles/update/listeArticle.html.twig', [
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
            $manager = $this->getDoctrine()->getManager();
            $newArticle = $form->getData();
            $article->setTitle($newArticle->getTitle())
                ->setContent($newArticle->getContent())
                ->setIdUser($newArticle->getIdUser())
                ->setSrcImage($newArticle->getSrcImage());
            $manager->flush();

            return $this->redirectToRoute('listeUpdate');
        }
        return $this->render('articles/update/updateArticle.html.twig', [
            'form' => $form->createView()
       ]);
    }
}