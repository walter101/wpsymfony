<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ComputerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('housingList', null, array('placeholder' => 'Behuizing' ))
            ->add('operatingSystemList', null, array('placeholder' => 'Operating system' ))
            ->add('graphicCard', null, array('placeholder' => 'Grafische kaart'))
            ->add('memory', null, array('placeholder' => 'Geheugen'))
            ->add('mainBoard', null, array('placeholder' => 'Moederboard'))
            ->add('processor', null, array('placeholder' => 'Processor'))
            ->add('color', null, array('placeholder' => 'Kleur'))
            ->add('image', FileType::class, array(
                'label' => 'Afbeelding',
                'data_class' => null,
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Computer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_computer';
    }


}
