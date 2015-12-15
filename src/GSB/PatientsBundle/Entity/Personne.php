<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"Personne" = "Personne", "Patient" = "Patient"})
 */
class Personne 
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
     * @ORM\Column(name="nomPersonne", type="string", length=50, nullable=false)
     */
    private $nompersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomPersonne", type="string", length=50, nullable=false)
     */
    private $prenompersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="numSS", type="string", length=15, nullable=false)
     */
    private $numss;



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
     * Set nompersonne
     *
     * @param string $nompersonne
     * @return Personne
     */
    public function setNompersonne($nompersonne)
    {
        $this->nompersonne = $nompersonne;
    
        return $this;
    }

    /**
     * Get nompersonne
     *
     * @return string 
     */
    public function getNompersonne()
    {
        return $this->nompersonne;
    }

    /**
     * Set prenompersonne
     *
     * @param string $prenompersonne
     * @return Personne
     */
    public function setPrenompersonne($prenompersonne)
    {
        $this->prenompersonne = $prenompersonne;
    
        return $this;
    }

    /**
     * Get prenompersonne
     *
     * @return string 
     */
    public function getPrenompersonne()
    {
        return $this->prenompersonne;
    }

    /**
     * Set numss
     *
     * @param string $numss
     * @return Personne
     */
    public function setNumss($numss)
    {
        $this->numss = $numss;
    
        return $this;
    }

    /**
     * Get numss
     *
     * @return string 
     */
    public function getNumss()
    {
        return $this->numss;
    }
    
    public function __toString() {
        return '';
    }
}