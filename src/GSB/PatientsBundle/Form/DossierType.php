<?php

namespace GSB\PatientsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DossierType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateentree')
            ->add('motifadmission')
            ->add('datesortie')
            ->add('codesoin')
            ->add('numpersonnepatient')
            ->add('numpersonneassure')
            ->add('codecaisse')
            ->add('codemotif')
            ->add('codemedecinprescripteur')
            ->add('codemedecintraitant')
            ->add('codeorigine')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GSB\PatientsBundle\Entity\Dossier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gsb_patientsbundle_dossier';
    }
}
