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
     * @var \varchar
     *
     * @ORM\Column(name="dateDemande", type="string", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $datedemande;

    /**
     * @var \varchar
     *
     * @ORM\Column(name="dateFin", type="string", nullable=false)
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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Dossier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numDossier", referencedColumnName="id")
     * })
     */
    private $numdossier;



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
        return $this->numdossier->getId();
    }
    
    public function __toString() {
        return '';
    }
    
 }