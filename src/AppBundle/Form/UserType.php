<?php

namespace AppBundle\Form;

use AppBundle\Form\DataTransformer\EmailAddressTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ]);

        $builder->get('email')->addModelTransformer(new EmailAddressTransformer());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserData::class,
            'csrf_protection' => false
        ]);
    }
}