<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Sointechnique;
use GSB\PatientsBundle\Form\SointechniqueType;

/**
 * Sointechnique controller.
 *
 */
class SointechniqueController extends Controller
{

    /**
     * Lists all Sointechnique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Sointechnique')->findAll();

        return $this->render('GSBPatientsBundle:Sointechnique:index.html.twig', array(
            'onglet' => 'undefined',
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Sointechnique entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Sointechnique();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sointechnique_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Sointechnique:new.html.twig', array( 'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Sointechnique entity.
    *
    * @param Sointechnique $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Sointechnique $entity)
    {
        $form = $this->createForm(new SointechniqueType(), $entity, array(
            'action' => $this->generateUrl('sointechnique_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sointechnique entity.
     *
     */
    public function newAction()
    {
        $entity = new Sointechnique();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Sointechnique:new.html.twig', array( 'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sointechnique entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Sointechnique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sointechnique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Sointechnique:show.html.twig', array( 'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Sointechnique entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Sointechnique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sointechnique entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Sointechnique:edit.html.twig', array( 'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Sointechnique entity.
    *
    * @param Sointechnique $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sointechnique $entity)
    {
        $form = $this->createForm(new SointechniqueType(), $entity, array(
            'action' => $this->generateUrl('sointechnique_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sointechnique entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Sointechnique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sointechnique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sointechnique_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Sointechnique:edit.html.twig', array( 'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Sointechnique entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Sointechnique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sointechnique entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sointechnique'));
    }

    /**
     * Creates a form to delete a Sointechnique entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sointechnique_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
