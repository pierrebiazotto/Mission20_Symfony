<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medecin
 *
 * @ORM\Table(name="Medecin")
 * @ORM\Entity
 */
class Medecin
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
     * @ORM\Column(name="nomMedecin", type="string", length=50, nullable=false)
     */
    private $nommedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomMedecin", type="string", length=50, nullable=false)
     */
    private $prenommedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="rueMedecin", type="string", length=100, nullable=false)
     */
    private $ruemedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="villeMedecin", type="string", length=50, nullable=false)
     */
    private $villemedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostalMedecin", type="string", length=5, nullable=false)
     */
    private $codepostalmedecin;



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
     * Set nommedecin
     *
     * @param string $nommedecin
     * @return Medecin
     */
    public function setNommedecin($nommedecin)
    {
        $this->nommedecin = $nommedecin;
    
        return $this;
    }

    /**
     * Get nommedecin
     *
     * @return string 
     */
    public function getNommedecin()
    {
        return $this->nommedecin;
    }

    /**
     * Set prenommedecin
     *
     * @param string $prenommedecin
     * @return Medecin
     */
    public function setPrenommedecin($prenommedecin)
    {
        $this->prenommedecin = $prenommedecin;
    
        return $this;
    }

    /**
     * Get prenommedecin
     *
     * @return string 
     */
    public function getPrenommedecin()
    {
        return $this->prenommedecin;
    }

    /**
     * Set ruemedecin
     *
     * @param string $ruemedecin
     * @return Medecin
     */
    public function setRuemedecin($ruemedecin)
    {
        $this->ruemedecin = $ruemedecin;
    
        return $this;
    }

    /**
     * Get ruemedecin
     *
     * @return string 
     */
    public function getRuemedecin()
    {
        return $this->ruemedecin;
    }

    /**
     * Set villemedecin
     *
     * @param string $villemedecin
     * @return Medecin
     */
    public function setVillemedecin($villemedecin)
    {
        $this->villemedecin = $villemedecin;
    
        return $this;
    }

    /**
     * Get villemedecin
     *
     * @return string 
     */
    public function getVillemedecin()
    {
        return $this->villemedecin;
    }

    /**
     * Set codepostalmedecin
     *
     * @param string $codepostalmedecin
     * @return Medecin
     */
    public function setCodepostalmedecin($codepostalmedecin)
    {
        $this->codepostalmedecin = $codepostalmedecin;
    
        return $this;
    }

    /**
     * Get codepostalmedecin
     *
     * @return string 
     */
    public function getCodepostalmedecin()
    {
        return $this->codepostalmedecin;
    }
    
    public function __toString() {
        return '';
    }
}