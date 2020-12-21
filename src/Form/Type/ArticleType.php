<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
            ->add('title', TextType::class, ['attr' => ['placeholder' => 'Titre', 'class' => 'box-input']])
            ->add('content', TextType::class, ['attr' => ['placeholder' => 'Contenu de l\'article', 'class' => 'box-input-art']])
            ->add('idUser', TextType::class, ['attr' => ['placeholder' => 'ID du redacteur', 'class' => 'box-input']])
            ->add('srcImage', TextType::class, ['attr' => ['placeholder' => 'Source de l\'image', 'class' => 'box-input']])
            ->add('save', SubmitType::class, ['label' => 'Confirmer', 'attr' => ['class' => 'add-button']]);
    }
}



?>