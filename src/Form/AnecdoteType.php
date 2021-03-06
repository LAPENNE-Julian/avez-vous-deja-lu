<?php

namespace App\Form;

use App\Entity\Anecdote;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AnecdoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                "label" => "Title", 'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a title',
                    ])
                    ],
            ])
            ->add('description', TextType::class, [
                "label" => "Description",
            ])
            ->add('content', TextareaType::class, [
                "label" => "Content", 'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a content',
                    ])
                    ],
                "attr" => ['class' => 'row'],
            ])
            ->add('source', UrlType::class, [
                "label" => "Source",
            ])
            ->add('img', null, [
                "label" => "Image",
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label' => 'Categories', 'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a category',
                    ])
                    ],
                'expanded' => true,
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Anecdote::class,
        ]);
    }
}
