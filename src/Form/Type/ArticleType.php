<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
            ->add('title', TextType::class, ['attr' => ['placeholder' => 'Titre..']])
            ->add('content', TextType::class, ['attr' => ['placeholder' => 'Saisir le contenu..']])
            ->add('idUser', TextType::class, ['attr' => ['placeholder' => 'ID de l\'utilisateur']])
            ->add('createdAt', DateTimeType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter']);
    }
}



?>