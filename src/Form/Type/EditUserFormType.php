<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,['constraints' =>[new NotBlank(['message' => 'Merci de saisir une adresse email'])],'required' => true,])
            ->add('roles', ChoiceType::class,['choices' => ['Utilisateurs' => 'ROLE_USER','Modérateur' => 'ROLE_MODO','Administrateur' => 'ROLE_ADMIN',],'expanded' => true,'multiple' => true,'label'=> 'Rôles'])
            ->add('name')
            ->add('username')
            ->add('Valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
