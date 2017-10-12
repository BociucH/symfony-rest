<?php

namespace AppBundle\Form;

use AppBundle\Form\DataTransformer\EmailAddressTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ]);

        $builder->get('email')->addModelTransformer(new EmailAddressTransformer());
    }

    public function requiredIfFirstName($object, ExecutionContextInterface $context)
    {
        if (!empty($object->firstName) && empty($object->lastName)) {
            $context
                ->buildViolation('Last name is required')
                ->atPath('lastName')
                ->addViolation();
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserData::class,
            'csrf_protection' => false,
            'constraints' => [
                new Callback([$this, 'requiredIfFirstName'])
            ]
        ]);
    }
}