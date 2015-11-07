<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sointechnique
 *
 * @ORM\Table(name="SoinTechnique")
 * @ORM\Entity
 */
class Sointechnique
{
    /**
     * @var float
     *
     * @ORM\Column(name="coefficientActe", type="float", nullable=false)
     */
    private $coefficientacte;

    /**
     * @var \Soin
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Soin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

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
     * Set id
     *
     * @param \GSB\PatientsBundle\Entity\Soin $id
     * @return Sointechnique
     */
    public function setId(\GSB\PatientsBundle\Entity\Soin $id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return \GSB\PatientsBundle\Entity\Soin 
     */
    public function getId()
    {
        return $this->id;
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