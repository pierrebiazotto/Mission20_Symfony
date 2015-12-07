<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Caisse;
use GSB\PatientsBundle\Form\CaisseType;

/**
 * Caisse controller.
 *
 */
class CaisseController extends Controller
{
    
    /**
     * Lists all Caisse entities.
     *
     */
    public function indexAction()
    {
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('GSBPatientsBundle:Caisse')->findAll();
            
            $lesParametres = array(
                'onglet' => 'undefined',
                'entities' => $entities,
            );
            
            return $this->render('GSBPatientsBundle:Caisse:index.html.twig', $lesParametres);
    }
    
    
    /**
     * Creates a new Caisse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Caisse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caisse_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Caisse:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Caisse entity.
    *
    * @param Caisse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Caisse $entity)
    {
        $form = $this->createForm(new CaisseType(), $entity, array(
            'action' => $this->generateUrl('caisse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Caisse entity.
     *
     */
    public function newAction()
    {
        $entity = new Caisse();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Caisse:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Caisse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Caisse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caisse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Caisse:show.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Caisse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Caisse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caisse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Caisse:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Caisse entity.
    *
    * @param Caisse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Caisse $entity)
    {
        $form = $this->createForm(new CaisseType(), $entity, array(
            'action' => $this->generateUrl('caisse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Caisse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Caisse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caisse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('caisse_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Caisse:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Caisse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Caisse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caisse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caisse'));
    }

    /**
     * Creates a form to delete a Caisse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('caisse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
     /**
     * Crée le formulaire de recherche d'une caisse.
     *
     */
    public function creerRechercheFormAction(Request $request)
    {
         
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
            
            $entities = $em->getRepository('GSBPatientsBundle:Caisse')->createQueryBuilder('c')
                    ->where('c.id LIKE :description')
                    ->setParameter('description', '%'.$valRecherchee.'%')
                    ->getQuery()
                    ->getResult();
            
            if (!$entities) {
                //je passe au template twig la valeur que je recherche
                //on ne peut pas passer une variable, il faut obligatoirement 
                //un objet ou un tableau associatif
                $defaultData = array('onglet' => 'caisse','valRecherchee' => $valRecherchee);
                return $this->render('GSBPatientsBundle:Caisse:erreur.recherche.html.twig', $defaultData);
            }

            $em->flush();
            return $this->render('GSBPatientsBundle:Caisse:index.html.twig', array(
            'entities' => $entities,
            'onglet' => 'caisse',
            ));
        }

        return $this->render('GSBPatientsBundle:Caisse:recherche.html.twig', array(
            'onglet' => 'caisse',
            'recherche_form' => $form->createView()));
    }
}
