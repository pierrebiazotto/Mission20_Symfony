<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Lettrecle;
use GSB\PatientsBundle\Form\LettrecleType;

/**
 * Lettrecle controller.
 *
 */
class LettrecleController extends Controller
{

    /**
     * Lists all Lettrecle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Lettrecle')->findAll();

        return $this->render('GSBPatientsBundle:Lettrecle:index.html.twig', array(
            'onglet' => 'undefined',
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Lettrecle entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Lettrecle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lettrecle_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Lettrecle:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Lettrecle entity.
    *
    * @param Lettrecle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Lettrecle $entity)
    {
        $form = $this->createForm(new LettrecleType(), $entity, array(
            'action' => $this->generateUrl('lettrecle_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Lettrecle entity.
     *
     */
    public function newAction()
    {
        $entity = new Lettrecle();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Lettrecle:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Lettrecle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Lettrecle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lettrecle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Lettrecle:show.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Lettrecle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Lettrecle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lettrecle entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Lettrecle:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Lettrecle entity.
    *
    * @param Lettrecle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Lettrecle $entity)
    {
        $form = $this->createForm(new LettrecleType(), $entity, array(
            'action' => $this->generateUrl('lettrecle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Lettrecle entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Lettrecle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lettrecle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lettrecle_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Lettrecle:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Lettrecle entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Lettrecle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lettrecle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lettrecle'));
    }

    /**
     * Creates a form to delete a Lettrecle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lettrecle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
