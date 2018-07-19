<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFiltersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('priceFrom')
            ->add('priceTo')
            ->add('filterMemory', EntityType::class, array(
                'placeholder' => 'Geheugen',
                'class' => 'AppBundle\Entity\MemoryList',
                'choice_value' => function ($choice) {
                    return $choice;
                },
            ))
            ->add('filterProcessor', EntityType::class, array(
                'placeholder' => 'Processor',
                'class' => 'AppBundle\Entity\Processor',
                'choice_value' => function ($choice) {
                    return $choice;
                },
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SearchFilters'
        ));
    }

    public function getName()
    {
        return 'app_bundle_search_filters_type';
    }
}
