<?php

namespace App\Form;

use App\Entity\Person2;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;


class Person2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            

            ->add('Qualification', ChoiceType::class,[
            'choices' =>[
                'Graduate'=> 'Graduate','Master'=> 'Master','Doctorate'=> 'Doctorate'],
                'expanded'=>false

        ])

            

            ->add('Gender', ChoiceType::class,[
            'choices' =>[
                'Male'=> 'Male','Female'=> 'Female'],
                'expanded'=>true
                //if you remove 'expanded', it will be drop down
        ])

            ->add('Description')
            ->add('Date_of_birth')
            

            ->add('Country', CountryType::class, [
           // 'mapped'=>false,
            'required'=>false,])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person2::class,
        ]);
    }
}
