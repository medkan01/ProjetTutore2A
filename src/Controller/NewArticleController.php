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
     * @Route("/articles/insert", name="insert")
     */
    public function createArticle(Request $request): Response
    {
        $article = new Article();
        $article->setCreatedAt(new \DateTime('now'));

        $form = $this->createForm(ArticleType::class, $article);

        return $this->render('articles/insert/insertArticle.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}