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
                'label' =>'Titre'
            ])

            ->add('content', TextType::class, [
                'label' =>'Article'
            ])

            ->add('user', TextType::class, [
                'label' => 'Auteur'
            ])
            ->add('category', TelType::class, [
                'label' => 'Catégorie'
            ])

            ->add('image', FileType::class, [
                'label' => 'image (file)',

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
