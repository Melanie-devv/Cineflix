<?php

namespace App\Form;

use App\Entity\Dvd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Dvd1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('release_date')
            ->add('duration')
            ->add('thumbnail')
            ->add('stock')
            ->add('producer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dvd::class,
        ]);
    }
}
