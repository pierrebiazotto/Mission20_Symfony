<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sointechnique
 *
 * @ORM\Entity
 */

class Sointechnique extends Soin
{
    /**
     * @var float
     *
     * @ORM\Column(name="coefficientActe", type="float", nullable=false)
     */
    private $coefficientacte;

     /**
     * @var \Lettrecle
     *
     * @ORM\ManyToOne(targetEntity="Lettrecle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLettreCle", referencedColumnName="id")
     * })
     */
    private $idlettrecle;

    /**
     * Set coefficientacte
     *
     * @param float $coefficientacte
     * @return Sointechnique
     */
    public function setCoefficientacte($coefficientacte)
    {
        $this->coefficientacte = $coefficientacte;
    
        return $this;
    }

    /**
     * Get coefficientacte
     *
     * @return float 
     */
    public function getCoefficientacte()
    {
        return $this->coefficientacte;
    }

    /**
     * Set idlettrecle
     *
     * @param \GSB\PatientsBundle\Entity\Lettrecle $idlettrecle
     * @return Sointechnique
     */
    public function setIdlettrecle(\GSB\PatientsBundle\Entity\Lettrecle $idlettrecle = null)
    {
        $this->idlettrecle = $idlettrecle;
    
        return $this;
    }

    /**
     * Get idlettrecle
     *
     * @return \GSB\PatientsBundle\Entity\Lettrecle 
     */
    public function getIdlettrecle()
    {
        return $this->idlettrecle;
    }
    
    public function __toString() {
        return '';
    }

}