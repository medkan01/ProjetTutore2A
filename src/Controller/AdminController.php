<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserFormType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="admin_")
     */

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @route("/utilisateurs", name="utilisateurs")
     */
    public function usersList(UserRepository $users){
        return $this->render("admin/users.html.twig",[
            'users'=> $users->findAll()
        ]);
    }

    /**
     * @Route("utilisateur/modifier/{id}", name="modifier_utilisateur")
     */
    public function editUser(User $user, Request $request){
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
    }

    /**
     * @Route("utilisateur//deleteuser/{id}", name="delete_user")
     */
    public function deleteUser(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($user);
        $entityManager->flush();

        return new Response('Utilisateur supprimé avec succés !');
    }
}
