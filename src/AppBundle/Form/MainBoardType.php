<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MainBoardType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('PCLex16', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('PCLex1', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('memorySlots', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('memoryMax')
            ->add('memoryTypes')
            ->add('usb2_0', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('usb3_0', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('usb3_1', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('hdmi_inputs', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('dvi_inputs', ChoiceType::class, array('choices' => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10) ) )
            ->add('bluetooth')
            ->add('wlan')
            ->add('microphone_in')
            ->add('line_in')
            ->add('line_out')
            ->add('image', FileType::class, array(
                'label' => 'Afbeelding',
                'data_class' => null,
            ));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\MainBoard'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_mainboard';
    }


}
