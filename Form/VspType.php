<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class VspType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('brand', EntityType::class, array(
                    'class' => 'AppBundle:Brand',
                    'choice_label' => 'name',
                    'multiple' => false,
                    'placeholder' => 'Sélectionnez une marque'
                ))
                ->add('model', EntityType::class, array(
                    'class' => 'AppBundle:Model',
                    'choice_label' => 'name',
                    'multiple' => false,
                    'placeholder' => 'Sélectionnez un modèle'
                ))
                ->add('type', EntityType::class, array(
                    'class' => 'AppBundle:VspType',
                    'choice_label' => 'name',
                    'multiple' => false,
                    'placeholder' => 'Sélectionnez un type de vsp'
                ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vsp'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_vsp';
    }

}
