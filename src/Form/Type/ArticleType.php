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
            ->add('title', TextType::class, ['attr' => ['placeholder' => 'Titre..', 'class' => 'box-input', 'id' => 'titrenews', 'name' => 'titrenews']])
            ->add('content', TextType::class, ['attr' => ['placeholder' => 'Saisir le contenu..', 'class' => 'box-text-area']])
            ->add('idUser', TextType::class, ['attr' => ['placeholder' => 'ID de l\'utilisateur..', 'class' => 'box-input']])
            ->add('srcImage', TextType::class, ['attr' => ['placeholder' => 'Source de l\'image..']])
            ->add('save', SubmitType::class, ['label' => 'Confirmer', 'attr' => ['class' => 'add-button']]);
    }
}



?>