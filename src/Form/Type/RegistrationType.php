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
        ->add('username', TextType::class, ['attr' => ['placeholder' => 'Nom d\'Utilisateur', 'class' => 'box-input']])
        ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom', 'class' => 'box-input']])
        ->add('email', TextType::class, ['attr' => ['placeholder' => 'Adresse Mail', 'class' => 'box-input']])

        ->add('roles', ChoiceType::class, [
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
            'options' => ['attr' => ['placeholder' => 'Mot de Passe', 'class' => 'password-field']],
            'required' => true,
            'first_options'  => ['label' => ' '],
            'second_options' => ['label' => ' '],
        ])

        ->add('verifpassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe ne sont pas identique.',
            'options' => ['attr' => ['placeholder' => 'Confirmer le Mot de Passe', 'class' => 'password-field']],
            'required' => true,
            'first_options'  => ['label' => ' '],
            'second_options' => ['label' => ' '],
        ])
            
        ->add('save', SubmitType::class, ['label' => 'Inscription', 'attr' => ['class' => 'add-button']]);
    }
}
