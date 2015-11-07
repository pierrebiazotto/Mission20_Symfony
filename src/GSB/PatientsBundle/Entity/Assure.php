<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assure
 *
 * @ORM\Table(name="Assure")
 * @ORM\Entity
 */
class Assure
{
    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set id
     *
     * @param \GSB\PatientsBundle\Entity\Personne $id
     * @return Assure
     */
    public function setId(\GSB\PatientsBundle\Entity\Personne $id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return \GSB\PatientsBundle\Entity\Personne 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __toString() {
        return '';
    }
}