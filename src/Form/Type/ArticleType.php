<?php
namespace App\Form\Type;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
            ->add('title', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Titre', 'class' => 'box-input']])
            ->add('content', CKEditorType::class, ['label' => false, 'attr' => ['placeholder' => 'Contenu de l\'article', 'class' => 'box-input-art']])
            ->add('idUser', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'ID du Redacteur', 'class' => 'box-input-v2']])
            ->add('srcImage', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Source de votre Image', 'class' => 'box-input']])
            ->add('save', SubmitType::class, ['label' => false, 'label' => 'Confirmer', 'attr' => ['class' => 'add-button']]);
    }
}
?>