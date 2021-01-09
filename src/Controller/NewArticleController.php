<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\Type\ArticleType;

class NewArticleController extends AbstractController
{
    /**
     * @Route("/insertArticle", name="insert")
     */
    public function createArticle(Request $request): Response
    {
        $article = new Article();
        $article->setCreatedAt(new \DateTime('now'));

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        //Il faut que Sylvio ajoute les vérifications pour que l'article ajouté soit correct et ne créer pas d'erreur(s) dans la bdd
        if($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }
        
        return $this->render('articles/insertArticle.html.twig', [
            'form' => $form->createView()
        ]);
    }
}