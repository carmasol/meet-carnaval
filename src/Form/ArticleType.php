<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [ 
                'required' => true,
                'label' =>'Titre'
            ])

            ->add('content', TextType::class, [
                'required' => true,
                'label' =>'Article'
            ])

            ->add('user', TextType::class, [
                'required' => true,
                'label' => 'Auteur'
            ])
            ->add('category', TelType::class, [
                'required' => true,
                'label' => 'Catégorie'
            ])

            ->add('image', FileType::class, [
                'required' => true,
                'label' => 'Image (file)',

                'mapped' => false,

                
                'required' => false,

                
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            
                        ],
                        'mimeTypesMessage' => 'Please upload a valid',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
