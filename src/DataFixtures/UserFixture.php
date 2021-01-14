<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 5; $i++){
            $user = new User();
            $user->setUsername("User_".$i);
            $user->setName("Name ".$i);
            $user->setPassword("Password");
            $user->setEmail("user@email.com");
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $manager->flush();
        }
        for($i = 0; $i < 2; $i++){
            $user = new User();
            $user->setUsername("Modo_".$i);
            $user->setName("Modo ".$i);
            $user->setPassword("Modo123");
            $user->setEmail("Modo@email.com");
            $user->setRoles(['ROLE_MODO']);
            $manager->persist($user);
            $manager->flush();
        }
            $user = new User();
            $user->setUsername("User_".$i);
            $user->setName("Name ".$i);
            $user->setPassword("Admin123");
            $user->setEmail("user@email.com");
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
            $manager->flush();
    }
}
