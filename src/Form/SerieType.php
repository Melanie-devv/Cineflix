<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, ['label' => 'Titre'])
            ->add('thumbnail', null, ['label' => 'Image'])
            ->add('releaseDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de sortie'
            ])
            ->add('artist', null, ['label' => 'Realisateur'])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    Serie::TYPES[0] => 0,
                    Serie::TYPES[1] => 1,
                    Serie::TYPES[2] => 2,
                ],
                'label' => 'Type'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
