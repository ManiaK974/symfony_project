<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

/**
 * Description of UserAdminRegistrationType
 *
 * @author ManiaK
 */
class UserAdminRegistrationType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('login')
                ->add('mail', EmailType::class)
                ->add('password', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'required' => true,
                    'invalid_message' => 'Le mot de passe et sa confirmation doivent être identiques',
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver  $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserAdmin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_useradmin';
    }

}
