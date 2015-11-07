<?php

namespace GSB\PatientsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GSB\PatientsBundle\Entity\Soin;

/**
 * Soin controller.
 *
 * @Route("/soin")
 */
class SoinController extends Controller
{

    /**
     * Lists all Soin entities.
     *
     * @Route("/", name="soin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GSBPatientsBundle:Soin')->findAll();

        return array(
            'entities' => $entities,
            'onglet' => 'soin',
        );
    }

    /**
     * Finds and displays a Soin entity.
     *
     * @Route("/{id}", name="soin_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GSBPatientsBundle:Soin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soin entity.');
        }

        return array(
            'entity'      => $entity,
            'onglet' => 'soin',
        );
    }
}
