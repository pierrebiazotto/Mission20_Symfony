<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandeentente
 *
 * @ORM\Table(name="DemandeEntente")
 * @ORM\Entity
 */
class Demandeentente
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
     * @var date
     *
     * @ORM\Column(name="dateDemande", type="date", nullable=false)
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $datedemande;

    /**
     * @var date
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=100, nullable=false)
     */
    private $reponse;

    /**
     * @var \Dossier
     *
     * @ORM\OneToOne(targetEntity="Dossier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numDossier", referencedColumnName="id")
     * })
     */
    private $numdossier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numdossier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    
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
     * Set id 
     *
     * @return Demandeentente
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set datedemande
     *
     * @param \DateTime $datedemande
     * @return Demandeentente
     */
    public function setDatedemande($datedemande)
    {
        $this->datedemande = $datedemande;
    
        return $this;
    }

    /**
     * Get datedemande
     *
     * @return \varchar 
     */
    public function getDatedemande()
    {
        return $this->datedemande;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Demandeentente
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    
        return $this;
    }

    /**
     * Get datefin
     *
     * @return \varchar 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set reponse
     *
     * @param string $reponse
     * @return Demandeentente
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    
        return $this;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    
    /**
     * Set numdossier
     *
     * @param \GSB\PatientsBundle\Entity\Dossier $numdossier
     * @return Demandeentente
     */
    public function setNumdossier(\GSB\PatientsBundle\Entity\Dossier $numdossier)
    {
        $this->numdossier = $numdossier;
    
        return $this;
    }

    /**
     * Get numdossier
     *
     * @return \GSB\PatientsBundle\Entity\Dossier 
     */
    public function getNumdossier()
    {
        return $this->numdossier;
    }
    
    
    public function __toString() {
        return '';
    }
    
 }