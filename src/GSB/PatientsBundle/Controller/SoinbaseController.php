<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Soinbase;
use GSB\PatientsBundle\Form\SoinbaseType;

/**
 * Soinbase controller.
 *
 */
class SoinbaseController extends Controller
{

    /**
     * Lists all Soinbase entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Soinbase')->findAll();

        return $this->render('GSBPatientsBundle:Soinbase:index.html.twig', array( 'onglet' => 'undefined',
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Soinbase entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Soinbase();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soinbase_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Soinbase:new.html.twig', array( 'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Soinbase entity.
    *
    * @param Soinbase $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Soinbase $entity)
    {
        $form = $this->createForm(new SoinbaseType(), $entity, array(
            'action' => $this->generateUrl('soinbase_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Soinbase entity.
     *
     */
    public function newAction()
    {
        $entity = new Soinbase();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Soinbase:new.html.twig', array( 'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Soinbase entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Soinbase')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soinbase entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Soinbase:show.html.twig', array( 'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Soinbase entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Soinbase')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soinbase entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Soinbase:edit.html.twig', array( 'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Soinbase entity.
    *
    * @param Soinbase $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Soinbase $entity)
    {
        $form = $this->createForm(new SoinbaseType(), $entity, array(
            'action' => $this->generateUrl('soinbase_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Soinbase entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Soinbase')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soinbase entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('soinbase_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Soinbase:edit.html.twig', array( 'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Soinbase entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Soinbase')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Soinbase entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('soinbase'));
    }

    /**
     * Creates a form to delete a Soinbase entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soinbase_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
