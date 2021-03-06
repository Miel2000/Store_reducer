<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DiscountRuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rule_expression', TextType::class, [
                'attr' => [
                    'class' => 'text-left',
                    'title' => 'Nom de la réduction'
                    ]
            ])
            ->add('discount_percent', NumberType::class,[
                'invalid_message' => 'Pas besoin d\'écrire le % :)',
                'invalid_message_parameters' => ["{{ type }}" => "float"]
            ] ,[
                'attr' => [
                    'class' => 'text-left',
                    'placeholder' => "30%",
                    'title' => 'Réduction en %'
                    ]
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
