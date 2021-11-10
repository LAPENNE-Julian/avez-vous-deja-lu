<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

use function PHPSTORM_META\type;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', null, [
                "label" => "Pseudo",
            ])
            ->add('email', EmailType::class, [
                "label" => "Email",
            ])
            ->add('password', PasswordType::class, [
                "label" => "Password",'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                        'normalizer' => 'trim'
                    ])
                    ],
                'required' => true,
            ])
            ->add('img', FileType::class, [
                'label' => 'Avatar',
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '200k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/svg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',
                        ])
                    ],
            ])
            ->add('roles', ChoiceType::class, [
                "label" => "Roles",'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a role',
                    ])
                    ],
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    } 

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
