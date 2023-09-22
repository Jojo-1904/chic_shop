<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Costume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ['required'=>$options['isNew'], 'label'=>'Image', "attr"=>["class"=>"select-image"]])
            ->remove('imageName')
            ->remove('updatedAt')
            // L'option dara permet de définir une valeur affichée par défaut
            ->add('rankOrder', IntegerType::class, ['required'=>true, 'data'=>1, "attr"=> ["min"=>1]])
        ;
        if(!$options["fromBook"])
            $builder
            // Pour rappel  choice_label permet de choisir le champ qui sera affiché dans le select
            // Auquel cas on n'a pas besoin de la methode __toString() dans l'entité
            ->add('costume', EntityType::class, ["class"=>Costume::class, "choice_label"=>'titre'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
            'fromBook'=>false,
            'isNew'=>true,
        ]);
    }
}
