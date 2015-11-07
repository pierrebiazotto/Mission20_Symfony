<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motifsortie
 *
 * @ORM\Table(name="MotifSortie")
 * @ORM\Entity
 */
class Motifsortie
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
     * @ORM\Column(name="libelleMotif", type="string", length=70, nullable=false)
     */
    private $libellemotif;



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
     * Set libellemotif
     *
     * @param string $libellemotif
     * @return Motifsortie
     */
    public function setLibellemotif($libellemotif)
    {
        $this->libellemotif = $libellemotif;
    
        return $this;
    }

    /**
     * Get libellemotif
     *
     * @return string 
     */
    public function getLibellemotif()
    {
        return $this->libellemotif;
    }
    
    public function __toString() {
        return '';
    }
}