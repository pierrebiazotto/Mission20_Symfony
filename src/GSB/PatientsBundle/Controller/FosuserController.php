<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GSB\PatientsBundle\Entity\User;
use GSB\PatientsBundle\Form\FosuserType;
use GSB\PatientsBundle\Form\RegistrationFormType;

/**
 * Fosuser controller.
 *
 */
class FosuserController extends Controller
{

    /**
     * Lists all Fosuser entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lesUtilisateurs = $em->getRepository('GSBPatientsBundle:User')->findAll();

        return $this->render('GSBPatientsBundle:Fosuser:index.html.twig', array(
            'onglet' => 'undefined',
            'entities' => $lesUtilisateurs,
        ));
    }
    
    
    /**
     * Creates a new Fosuser entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Fosuser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosuser_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:User:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    
    /**
     * Displays a form to create a new Fosuser entity.
     *
     */
    public function newAction()
    {       
        $utilisateur = new User();
        
        $form = $this->createForm(new FosuserType(), $utilisateur, array(
            'action' => $this->generateUrl('fos_user_profile_new_user'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        //$form = $this->createUserForm($utilisateur);
        return $this->render('GSBPatientsBundle:Fosuser:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $utilisateur,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Fosuser entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fosuser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Fosuser:show.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Fosuser entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fosuser entity.');
        }

        $editForm = $this->createForm(new FosuserType(), $entity, array(
            'action' => $this->generateUrl('fos_user_profile_update_user', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Fosuser:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Fosuser entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fosuser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fos_user_profile_edit_user', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Fosuser:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Fosuser entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fosuser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fosuser'));
    }

    /**
     * Creates a form to delete a Fosuser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fos_user_profile_delete_user', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    

}
