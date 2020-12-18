<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++){
            $article = new Article();
            $article->setTitle("Article");
            $article->setContent("Contenu de l'article");
            $article->setIdUser(1);
            $article->setCreatedAt(new \DateTime('now'));
            $article->setSrcImage("http://placehold.it/350x150");
            $manager->persist($article);
            $manager->flush();
        }
    }
}
