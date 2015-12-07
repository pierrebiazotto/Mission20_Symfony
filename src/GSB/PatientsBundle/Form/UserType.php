<?php
  
namespace GSB\PatientsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
  
class UserType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
          ->add('nom', null, array('attr' => array('class' => 'inputText')))
          ->add('prenom', null, array('attr' => array('class' => 'inputText')));
        ;
    }
  
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Veb\UserBundle\Entity\User'
        ));
    }
  
    public function getName()
    {
        return 'veb_user_registration';
    }
}