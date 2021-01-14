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
        if($user->confirm_password == $user->getPassword()){
            $form = $this->createForm(EditUserFormType::class, $user);
            $form->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid()){
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
    
                $this->addFlash('message', 'Utilisateur modifié avec succès');
                return $this->redirectToRoute('admin_utilisateurs');
            }
    
            return $this->render('admin/edituser.html.twig',[
                'userForm' => $form->createView()
            ]);
        }else{
            return new Response('Les mots de passe ne sont pas identique.');
        }
    }
}