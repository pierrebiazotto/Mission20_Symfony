<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GSB\PatientsBundle\Entity\Motifsortie;
use GSB\PatientsBundle\Form\MotifsortieType;

/**
 * Motifsortie controller.
 *
 */
class MotifsortieController extends Controller
{
    public function verification(Request $request)

  {

    // On vérifie que l'utilisateur dispose bien du rôle ROLE_AUTEUR

    if (!$this->get('security.context')->isGranted('ROLE_MEDECIN')) {

      // Sinon on déclenche une exception « Accès interdit »

      throw new AccessDeniedException('Accès limité aux Médecins.');

    }


    // Ici l'utilisateur a les droits suffisant,

    // on peut ajouter une annonce

  }
    
    /**
     * Lists all Motifsortie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Motifsortie')->findAll();

        return $this->render('GSBPatientsBundle:Motifsortie:index.html.twig', array(
            'onglet' => 'undefined',
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Motifsortie entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Motifsortie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('motifsortie_show', array('id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Motifsortie:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Motifsortie entity.
    *
    * @param Motifsortie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Motifsortie $entity)
    {
        $form = $this->createForm(new MotifsortieType(), $entity, array(
            'action' => $this->generateUrl('motifsortie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Motifsortie entity.
     *
     */
    public function newAction()
    {
        $entity = new Motifsortie();
        $form   = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Motifsortie:new.html.twig', array(
            'onglet' => 'undefined',
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Motifsortie entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Motifsortie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Motifsortie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Motifsortie:show.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Motifsortie entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Motifsortie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Motifsortie entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Motifsortie:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Motifsortie entity.
    *
    * @param Motifsortie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Motifsortie $entity)
    {
        $form = $this->createForm(new MotifsortieType(), $entity, array(
            'action' => $this->generateUrl('motifsortie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Motifsortie entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Motifsortie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Motifsortie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('motifsortie_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Motifsortie:edit.html.twig', array(
            'onglet' => 'undefined',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Motifsortie entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Motifsortie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Motifsortie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('motifsortie'));
    }

    /**
     * Creates a form to delete a Motifsortie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('motifsortie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
