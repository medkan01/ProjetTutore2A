<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Nom d\' Utilisateur', 'class' => 'box-input']])
        ->add('name', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Nom', 'class' => 'box-input']])
        ->add('email', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Adresse Mail', 'class' => 'box-input']])

        ->add('roles', ChoiceType::class, [
            'label' => false, 
            'choices' => [
                'Utilisateur' => 'ROLE_USER',
                'Modérateur' => 'ROLE_MODO',
                'Administrateur' => 'ROLE_ADMIN',
            ],
            'expanded' => true,
            'multiple' => true,
        ])

        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe ne sont pas identique.',
            'required' => true,
            'first_options'  => ['label' => false, 'attr' => ['label' => ' ', 'placeholder' => 'Mot de Passe', 'class' => 'box-input']],
            'second_options' => ['label' => false, 'attr' => ['label' => ' ', 'placeholder' => 'Confirmer Mot de Passe', 'class' => 'box-input']],
        ])
            
        ->add('save', SubmitType::class, ['label' => 'Valider', 'attr' => ['class' => 'add-button']]);
    }
}
