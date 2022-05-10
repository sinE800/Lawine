<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr' => ['class' =>'form-control', 'placeholder' => 'Nom'],
            ])
            ->add('firstname', TextType::class,[
                'attr' => ['class' =>'form-control', 'placeholder' => 'Prénom'],
            ])
            ->add('sexe', ChoiceType::class, [
                'choices'  => [

                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                    'Autres' => 'Autres',
                ],
                'placeholder' => 'Choisissez une option'
            ])
            ->add('dateOfBirth', BirthdayType::class,[
                'attr' => [ 'placeholder' => 'Date de naissance'],
            ])

            ->add('email', EmailType::class,[
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer un e-mail',
                    ]),
                ],
                'required' => true,
                'attr' => ['class' =>'form-control', 'placeholder' => 'Adresse mail'],

            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [

                ],

            ])
//            ->add('plainPassword', PasswordType::class, [
//                // instead of being set onto the object directly,
//                // this is read and encoded in the controller
//
//                'mapped' => false,
//                'attr' => ['autocomplete' => 'new-password'],
//                'constraints' => [
//                    new NotBlank([
//                        'message' => 'Veuillez écrire un mot de passe.',
//                    ]),
//                    new Length([
//                        'min' => 6,
//                        'minMessage' => 'Votre mot de passe doit être de {{ limit }} charactères minimum.',
//                        'maxMessage' => 'Votre mot de passe doit être de {{ limit }} charactères maximum.',
//                        // max length allowed by Symfony for security reasons
//                        'max' => 30,
//                    ]),
//                ],
//            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mot de passe ne correspondent pas.',
                'constraints' => [
                new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit être de 6 charactères minimum.',
                        'maxMessage' => 'Votre mot de passe doit être de 30 charactères maximum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 30,
                    ]),
                ],

                'options' => ['attr' => ['class' => 'password-field form-control','placeholder' => 'Mot de passe' ]],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe', ],
                'second_options' => ['label' => 'Répètez le mot de passe']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
