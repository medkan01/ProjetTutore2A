<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function createUser(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user   ->setEmail('john@doe.fr')
                ->setPassword('password')
                ->setRoles(['Gestion du personnel', 'Gestion de la finance'])
                ->setName('John Doe')
                ->setUsername('john doe');

        $entityManager->persist($user);
        echo $user->getEmail();
        $entityManager->flush();

        return new Response('Saved new user with id '.$user->getId());
    }
}
