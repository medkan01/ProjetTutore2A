<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function createUser(User $user, Request $request): Response
    {
            $form = $this->createForm(RegistrationFormType::class, $user);
            $form->handleRequest($request);
            $user->setRoles(['ROLE_USER']);
    
            if($form->isSubmitted() && $form->isValid()){
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
    
                $this->addFlash('message', 'Utilisateur créer avec succès');
                return $this->redirectToRoute('admin_utilisateurs');
            }
    
            return $this->render('/inscription.html.twig',[
                'userForm' => $form->createView()
            ]);
    }
}