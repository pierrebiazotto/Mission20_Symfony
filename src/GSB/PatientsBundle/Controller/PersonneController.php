<?php

namespace GSB\PatientsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GSB\PatientsBundle\Entity\Personne;
use GSB\PatientsBundle\Form\PersonneType;

/**
 * Personne controller.
 *
 */
class PersonneController extends Controller {

    /**
     * Lists all Personne entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Personne')->findAll();

        return $this->render('GSBPatientsBundle:Personne:index.html.twig', array(
                    'onglet' => 'undefined',
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Personne entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Personne();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personne_show', array('onglet' => 'undefined', 'id' => $entity->getId())));
        }

        return $this->render('GSBPatientsBundle:Personne:new.html.twig', array(
                    'onglet' => 'undefined',
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Personne entity.
     *
     * @param Personne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Personne $entity) {
        $form = $this->createForm(new PersonneType(), $entity, array(
            'action' => $this->generateUrl('personne_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Personne entity.
     *
     */
    public function newAction() {
        $entity = new Personne();
        $form = $this->createCreateForm($entity);

        return $this->render('GSBPatientsBundle:Personne:new.html.twig', array(
                    'onglet' => 'undefined',
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personne entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Personne:show.html.twig', array(
                    'onglet' => 'undefined',
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Personne entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GSBPatientsBundle:Personne:edit.html.twig', array(
                    'onglet' => 'undefined',
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Personne entity.
     *
     * @param Personne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Personne $entity) {
        $form = $this->createForm(new PersonneType(), $entity, array(
            'action' => $this->generateUrl('personne_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Personne entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personne_edit', array('id' => $id)));
        }

        return $this->render('GSBPatientsBundle:Personne:edit.html.twig', array(
                    'onglet' => 'undefined',
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Personne entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GSBPatientsBundle:Personne')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personne entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personne'));
    }

    /**
     * Creates a form to delete a Personne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('personne_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * Crée le formulaire de recherche d'une personne.
     *
     */
    public function creerRechercheFormAction(Request $request) {

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


            //$entities = $em->getRepository('GSBPatientsBundle:Personne')->findBy(array('nompersonne' => $valRecherchee));
            $entities = $em->getRepository('GSBPatientsBundle:Personne')->createQueryBuilder('c')
                    ->where('c.nompersonne LIKE :description')
                    ->setParameter('description', '%' . $valRecherchee . '%')
                    ->getQuery()
                    ->getResult();

            if (!$entities) {
                //je passe au template twig la valeur que je recherche
                //on ne peut pas passer une variable, il faut obligatoirement 
                //un objet ou un tableau associatif
                $defaultData = array('onglet' => 'personne', 'valRecherchee' => $valRecherchee);
                return $this->render('GSBPatientsBundle:Personne:erreur.recherche.html.twig', $defaultData);
            }

            $em->flush();
            return $this->render('GSBPatientsBundle:Personne:index.html.twig', array(
                        'entities' => $entities,
                        'onglet' => 'personne',
            ));
        }

        return $this->render('GSBPatientsBundle:Personne:recherche.html.twig', array(
                    'onglet' => 'personne',
                    'recherche_form' => $form->createView()));
    }
    
   
}
