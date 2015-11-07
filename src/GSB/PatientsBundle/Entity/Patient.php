<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="Patient")
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var string
     *
     * @ORM\Column(name="ruePatient", type="string", length=100, nullable=false)
     */
    private $ruepatient;

    /**
     * @var string
     *
     * @ORM\Column(name="villePatient", type="string", length=50, nullable=false)
     */
    private $villepatient;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostalPatient", type="string", length=5, nullable=false)
     */
    private $codepostalpatient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=false)
     */
    private $datenaissance;

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
     * Set ruepatient
     *
     * @param string $ruepatient
     * @return Patient
     */
    public function setRuepatient($ruepatient)
    {
        $this->ruepatient = $ruepatient;
    
        return $this;
    }

    /**
     * Get ruepatient
     *
     * @return string 
     */
    public function getRuepatient()
    {
        return $this->ruepatient;
    }

    /**
     * Set villepatient
     *
     * @param string $villepatient
     * @return Patient
     */
    public function setVillepatient($villepatient)
    {
        $this->villepatient = $villepatient;
    
        return $this;
    }

    /**
     * Get villepatient
     *
     * @return string 
     */
    public function getVillepatient()
    {
        return $this->villepatient;
    }

    /**
     * Set codepostalpatient
     *
     * @param string $codepostalpatient
     * @return Patient
     */
    public function setCodepostalpatient($codepostalpatient)
    {
        $this->codepostalpatient = $codepostalpatient;
    
        return $this;
    }

    /**
     * Get codepostalpatient
     *
     * @return string 
     */
    public function getCodepostalpatient()
    {
        return $this->codepostalpatient;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     * @return Patient
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    
        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set id
     *
     * @param \GSB\PatientsBundle\Entity\Personne $id
     * @return Patient
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