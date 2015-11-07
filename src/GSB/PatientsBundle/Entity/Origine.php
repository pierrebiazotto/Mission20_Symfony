<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Origine
 *
 * @ORM\Table(name="Origine")
 * @ORM\Entity
 */
class Origine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleOrigine", type="string", length=50, nullable=false)
     */
    private $libelleorigine;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelleorigine
     *
     * @param string $libelleorigine
     * @return Origine
     */
    public function setLibelleorigine($libelleorigine)
    {
        $this->libelleorigine = $libelleorigine;
    
        return $this;
    }

    /**
     * Get libelleorigine
     *
     * @return string 
     */
    public function getLibelleorigine()
    {
        return $this->libelleorigine;
    }
    
    public function __toString() {
        return '';
    }
}