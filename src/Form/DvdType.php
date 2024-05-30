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
            ->add('name', null, ['label' => 'Nom'])
            ->add('release_date', null, ['label' => 'Date de sortie'])
            ->add('duration', null, ['label' => 'Durée (en minutes)'])
            ->add('thumbnail', null, ['label' => 'Miniature'])
            ->add('stock', null, ['label' => 'Stock'])
            ->add('producer', null, ['label' => 'Directeur'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dvd::class,
        ]);
    }
}
