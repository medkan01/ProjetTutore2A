<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\Type\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpdateArticleController extends AbstractController
{
    /**
     * @IsGranted("ROLE_MODO")
     * @Route("/update/{id}", name="update")
     */
    public function updateArticle(Request $request, Article $article): Response
    {
        
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        //Il faut que Sylvio ajoute les vérifications pour que l'article ajouté soit correct et ne créer pas d'erreur(s) dans la bdd
        if($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $newArticle = $form->getData();
            $article->setTitle($newArticle->getTitle())
                ->setContent($newArticle->getContent())
                ->setIdUser($newArticle->getIdUser())
                ->setSrcImage($newArticle->getSrcImage())
                ->setUpdatedAt(new \DateTime('now'));
            $manager->flush();

            return $this->redirectToRoute('liste_articles');
        }
        return $this->render('articles/updateArticle.html.twig', [
            'form' => $form->createView()
       ]);
    }
}