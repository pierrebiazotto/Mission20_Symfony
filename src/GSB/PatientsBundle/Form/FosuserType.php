<?php

namespace GSB\PatientsBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FosuserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch', ) )
            ->add('roles', 'collection', array(
                'type'   => 'choice',
                'options'  => array(
                    'choices'  => array(
                        'ROLE_SECRETAIRE' => 'secretaire',
                        'ROLE_MEDECIN'    => 'medecin',
                        'ROLE_ADMIN'      => 'administrateur',
                        ),
                    ),
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GSB\PatientsBundle\Entity\User'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'gsb_patientsbundle_fosuser';
    }
}