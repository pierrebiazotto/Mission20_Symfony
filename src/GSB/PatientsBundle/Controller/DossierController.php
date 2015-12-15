<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Dossier;
use GSB\PatientsBundle\Form\DossierType;

/**
 * Dossier controller.
 *
 */
class DossierController extends Controller
{

    /**
     * Lists all Dossier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Dossier')->findAll();

        return $this->render('GSBPatientsBundle:Dossier:index.html.twig', array(
            'onglet' => 'undefined',
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Dossier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Dossier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dossier_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Dossier:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Dossier entity.
    *
    * @param Dossier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Dossier $entity)
    {
        $form = $this->createForm(new DossierType(), $entity, array(
            'action' => $this->generateUrl('dossier_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Dossier entity.
     *
     */
    public function newAction()
    {
        $entity = new Dossier();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Dossier:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Dossier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Dossier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dossier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Dossier:show.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Dossier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GSBPatientsBundle:Dossier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dossier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        
        
        $array= array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
        var_dump($array);
        return $this->render('GSBPatientsBundle:Dossier:edit.html.twig',$array);
    }

    /**
    * Creates a form to edit a Dossier entity.
    *
    * @param Dossier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Dossier $entity)
    {
        $form = $this->createForm(new DossierType(), $entity, array(
            'action' => $this->generateUrl('dossier_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Dossier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Dossier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dossier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dossier_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Dossier:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Dossier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Dossier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dossier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dossier'));
    }
    
    // Création recherche Patients par dossier
     public function creerRechercheDossierFormAction(Request $request) {

        $form = $this->createFormBuilder()
                ->add('id', 'text')
                ->add('recherche', 'submit')
                ->getForm();

        $form->handleRequest($request);

        // Lorsqu'on n'utilise pas d'objet, les données sont sous forme d'un tableau avec les 
        // clés correspondant aux différents items du formulaire
        // exemple : 
        // $data = $form->getData();
        // echo $data["name"];

        if ($form->isValid()) {
            //je récupère ce qui est passé en paramètres de la recherche
            $data = $form->getData();
            $valRecherchee = $data["id"];

            $em = $this->getDoctrine()->getManager();
            
            //retourner un arraylist de dossiers MAIS on fait une recherche sur une clé donc
            //on a un arraylist avec un dossier unique
            $entities = $em->getRepository('GSBPatientsBundle:Dossier')->createQueryBuilder('d')
                    ->where('d.id = :id')
                    ->setParameter('id', $valRecherchee)
                    ->getQuery()
                    ->getResult();
            
            $em->flush();
           
            $defaultData = array('onglet' => 'Dossier', 'dossier' => $entities[0], 'patient' => $entities[0]->getNumpersonnepatient() );
            return $this->render('GSBPatientsBundle:Dossier:resultatrecherche.html.twig', $defaultData);
            
        }

        return $this->render('GSBPatientsBundle:Dossier:recherche.html.twig', array(
                    'onglet' => 'dossier',
                    'recherche_form' => $form->createView()));
    }


    /**
     * Creates a form to delete a Dossier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dossier_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
