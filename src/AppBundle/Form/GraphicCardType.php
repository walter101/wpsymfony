<?php

namespace AppBundle\Form;

use AppBundle\Entity\GraphicCard;
use AppBundle\Entity\MemoryList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class GraphicCardType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // Get the selected value for the memoryList
        $choice = $options['data']->getMemory();

        $builder
            ->add('name')
            ->add('slots')
            ->add('memory', EntityType::class, array(
                'class' => 'AppBundle\Entity\MemoryList',
                'choice_value' => function ($choice) {
                    return $choice;
                },

            ))
            ->add('memoryType')
            ->add('memoryInterfact')
            ->add('memorySpeed')
            ->add('clockSpeed')
            ->add('dvi')
            ->add('hdmi')
            ->add('powerUse')
            ->add('image', FileType::class, array(
                'label' => 'Afbeelding',
                'data_class' => null,
            ))
            ->add('status');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GraphicCard',

        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_graphiccard';
    }


}
