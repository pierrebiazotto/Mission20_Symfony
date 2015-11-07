<?php

namespace GSB\PatientsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedecinType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nommedecin')
            ->add('prenommedecin')
            ->add('ruemedecin')
            ->add('villemedecin')
            ->add('codepostalmedecin')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GSB\PatientsBundle\Entity\Medecin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gsb_patientsbundle_medecin';
    }
}
