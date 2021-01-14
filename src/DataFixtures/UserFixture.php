<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $encoder = new UserPasswordEncoderInterface;

        for($i = 0; $i < 5; $i++){
            $user = new User();
            $user->setUsername("User_".$i);
            $user->setName("Name ".$i);
            $user->setPassword("Password");
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
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
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setEmail("Modo@email.com");
            $user->setRoles(['ROLE_MODO']);
            $manager->persist($user);
            $manager->flush();
        }
            $user = new User();
            $user->setUsername("User_".$i);
            $user->setName("Name ".$i);
            $user->setPassword("Admin123");
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setEmail("user@email.com");
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
            $manager->flush();
    }
    
}
