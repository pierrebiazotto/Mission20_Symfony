<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    //A chaque appel de la vue, un parametre onglet doit etre passer pour definir quel onglet du menu doit etre mis en surbrillance dans la vue
    
    /*public function indexnonconnecteAction()
    {
        return $this->render('GSBPatientsBundle:Default:indexnonconnecte.html.twig',array('onglet'=>'index'));
    }*/
    
    public function indexconnecteAction()
    {
        return $this->render('GSBPatientsBundle:Default:indexconnecte.html.twig',array('onglet'=>'index'));
    }
}
