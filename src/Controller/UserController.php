<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    public function createUser(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Nouvel utilisateur créé avec l\'id: '.$user->getId());
    }

    public function deleteUser(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($user);
        $entityManager->flush();

        return new Response('Utilisateur supprimé avec succés !');
    }

    public function updateUser(int $id, User $newUser): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

        $user->setEmail($newUser->getEmail());
        $user->setPassword($newUser->getPassword());
        $user->setRoles($newUser->getRoles());
        $user->setName($newUser->getName());
        $user->setUsername($newUser->getUsername());
        $entityManager->flush();

        return new Response('Utilisateur modifié avec succés !');
    }
}