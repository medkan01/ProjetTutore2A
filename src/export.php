<?php

use App\Repository\ArticleRepository;

function export(ArticleRepository $repo){
  $donnees = $repo->findAll();

  $xml= new XMLWriter();
  $xml->openUri("articles.xml");
  $xml->startDocument('1.0', 'utf-8');
  $xml->startElement('mesarticles');

  while($donnees->fetch()){
    $xml->startElement('article');
    $xml->writeAttribute('id', $donnees['id']);
    $xml->writeElement('titre',$donnees['title']);
    $xml->writeElement('date',$donnees['created_at']);
    $xml->writeElement('contenu',$donnees['content']);
    $xml->endElement();
  }
  
  $xml->endElement();
  $xml->endElement();
  $xml->flush();
}

?>