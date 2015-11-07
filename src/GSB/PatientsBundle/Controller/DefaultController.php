<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    //A chaque appel de la vue, un parametre onglet doit etre passer pour definir quel onglet du menu doit etre mis en surbrillance dans la vue
    
    public function indexAction()
    {
        return $this->render('GSBPatientsBundle:Default:index.html.twig',array('onglet'=>'index'));
    }
}
