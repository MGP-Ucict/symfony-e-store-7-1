<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
			->add('email', EmailType::class, [
				'label' => 'Email',
				'label_attr' => ['class' => 'col-md-4 col-form-label text-md-end'],
				'attr' => ['class' => 'form-control']
			])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
				'label_attr' => ['class' => 'col-md-4 form-check-label'],
				'attr' => ['class' => 'form-control form-check-input'],
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
				'label' => 'Password',
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password','class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
			->add('plainPassword', RepeatedType::class, [
				'type' => PasswordType::class,
				'mapped' => false,
				'label_attr' => ['class' => 'col-md-4 col-form-label text-md-end'],
				'invalid_message' => 'The password fields must match.',
				'options' => ['attr' => ['class' => 'form-control']],
				'required' => true,
				'first_options'  => [
					'label' => 'Password',
					'label_attr' => ['class' => 'col-md-4 col-form-label text-md-end']
				],
				'second_options' => [
					'label' => 'Repeat Password',
					'label_attr' => ['class' => 'col-md-4 col-form-label text-md-end']
				],
			]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
