<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Demandeentente;
use GSB\PatientsBundle\Form\DemandeententeType;

/**
 * Demandeentente controller.
 *
 */
class DemandeententeController extends Controller
{

    /**
     * Lists all Demandeentente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Demandeentente')->findAll();

        return $this->render('GSBPatientsBundle:Demandeentente:index.html.twig', array(
            'onglet' => 'undefined',
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Demandeentente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Demandeentente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('demandeentente_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Demandeentente:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Demandeentente entity.
    *
    * @param Demandeentente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Demandeentente $entity)
    {
        $form = $this->createForm(new DemandeententeType(), $entity, array(
            'action' => $this->generateUrl('demandeentente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Demandeentente entity.
     *
     */
    public function newAction()
    {
        $entity = new Demandeentente();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Demandeentente:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Demandeentente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Demandeentente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Demandeentente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Demandeentente:show.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Demandeentente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $laDemandeEntente = $em->getRepository('GSBPatientsBundle:Demandeentente')->find($id);

        if (!$laDemandeEntente) {
            throw $this->createNotFoundException('Unable to find Demandeentente entity.');
        }

        $editForm = $this->createEditForm($laDemandeEntente);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Demandeentente:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $laDemandeEntente,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Demandeentente entity.
    *
    * @param Demandeentente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Demandeentente $entity)
    {
        $form = $this->createForm(new DemandeententeType(), $entity, array(
            'action' => $this->generateUrl('demandeentente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Demandeentente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Demandeentente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Demandeentente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('demandeentente_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Demandeentente:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Demandeentente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Demandeentente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Demandeentente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('demandeentente'));
    }

    /**
     * Creates a form to delete a Demandeentente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandeentente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
