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
use XMLWriter;

// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;


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
        $xml->openUri("articles.xml");
        $xml->startDocument('1.0', 'utf-8');
        $xml->startElement('mesarticles');
        $xml->startElement('article');
        $xml->writeAttribute('id', $article['id']);
        $xml->writeElement('titre',$article['title']);
        $xml->writeElement('date',$article['created_at']);
        $xml->writeElement('contenu',$article['content']);
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();
        $xml->flush();
      }
}