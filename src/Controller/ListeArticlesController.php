<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Form\Type\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;
use XMLWriter;


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

    /**
     * @Route("/export/{id}", name="exportationXML")
     */
    function export(Article $article){
      
        $xml= new XMLWriter();
        $date = $article->getCreatedAt();
        $result = $date->format('Y-m-d H:i:s');
        $result2 = "pas de modification";
        if($article->getUpdatedAt() != null){
            $date = $article->getUpdatedAt();
            $result2 = $date->format('Y-m-d H:i:s');
        }

        $xml->openUri("articles".$article->getId().".xml");
        $xml->startDocument('1.0', 'utf-8');
        $xml->startElement('Article');
        $xml->writeElement('id', $article->getId());
        $xml->writeElement('titre',$article->getTitle());
        $xml->writeElement('datecreation',$result);
        $xml->writeElement('datemodification',$result2);
        $xml->writeElement('contenu',$article->getContent());
        $xml->writeElement('image',$article->getSrcImage());
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();
        $xml->flush();
        return $this->redirectToRoute('liste_articles');
      }
}