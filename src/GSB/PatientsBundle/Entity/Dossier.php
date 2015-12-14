<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Dossier
 *
 * @ORM\Table(name="Dossier")
 * @ORM\Entity
 */
class Dossier
{
    /**
     * @var id
     *
     * @ORM\Column(name="id", type="id", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \varchar
     *
     * @ORM\Column(name="dateEntree", type="string", nullable=false)
     */
    private $dateentree;

    /**
     * @var string
     *
     * @ORM\Column(name="motifAdmission", type="string", length=30, nullable=false)
     */
    private $motifadmission;

    /**
     * @var \varchar
     *
     * @ORM\Column(name="dateSortie", type="string", nullable=false)
     */
    private $datesortie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Soin", mappedBy="numdossier")
     */
    private $codesoin;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numPersonnePatient", referencedColumnName="id")
     * })
     */
    private $numpersonnepatient;

    /**
     * @var \Assure
     *
     * @ORM\ManyToOne(targetEntity="Assure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numPersonneAssure", referencedColumnName="id")
     * })
     */
    private $numpersonneassure;

    /**
     * @var \Caisse
     *
     * @ORM\ManyToOne(targetEntity="Caisse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeCaisse", referencedColumnName="id")
     * })
     */
    private $codecaisse;

    /**
     * @var \Motifsortie
     *
     * @ORM\ManyToOne(targetEntity="Motifsortie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeMotif", referencedColumnName="id")
     * })
     */
    private $codemotif;

    /**
     * @var \Medecin
     *
     * @ORM\ManyToOne(targetEntity="Medecin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeMedecinPrescripteur", referencedColumnName="id")
     * })
     */
    private $codemedecinprescripteur;

    /**
     * @var \Medecin
     *
     * @ORM\ManyToOne(targetEntity="Medecin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeMedecinTraitant", referencedColumnName="id")
     * })
     */
    private $codemedecintraitant;

    /**
     * @var \Origine
     *
     * @ORM\ManyToOne(targetEntity="Origine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeOrigine", referencedColumnName="id")
     * })
     */
    private $codeorigine;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codesoin = new \Doctrine\Common\Collections\ArrayCollection();
        
    }
    

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateentree
     *
     * @param \DateTime $dateentree
     * @return Dossier
     */
    public function setDateentree($dateentree)
    {
        $this->dateentree = $dateentree;
    
        return $this;
    }

    /**
     * Get dateentree
     *
     * @return \string 
     */
    public function getDateentree()
    {
        return $this->dateentree;
    }

    /**
     * Set motifadmission
     *
     * @param string $motifadmission
     * @return Dossier
     */
    public function setMotifadmission($motifadmission)
    {
        $this->motifadmission = $motifadmission;
    
        return $this;
    }

    /**
     * Get motifadmission
     *
     * @return string 
     */
    public function getMotifadmission()
    {
        return $this->motifadmission;
    }

    /**
     * Set datesortie
     *
     * @param \DateTime $datesortie
     * @return Dossier
     */
    public function setDatesortie($datesortie)
    {
        $this->datesortie = $datesortie;
    
        return $this;
    }

    /**
     * Get datesortie
     *
     * @return \string 
     */
    public function getDatesortie()
    {
        return $this->datesortie;
    }

    /**
     * Add codesoin
     *
     * @param \GSB\PatientsBundle\Entity\Soin $codesoin
     * @return Dossier
     */
    public function addCodesoin(\GSB\PatientsBundle\Entity\Soin $codesoin)
    {
        $this->codesoin[] = $codesoin;
    
        return $this;
    }

    /**
     * Remove codesoin
     *
     * @param \GSB\PatientsBundle\Entity\Soin $codesoin
     */
    public function removeCodesoin(\GSB\PatientsBundle\Entity\Soin $codesoin)
    {
        $this->codesoin->removeElement($codesoin);
    }

    /**
     * Get codesoin
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodesoin()
    {
        return $this->codesoin;
    }

    /**
     * Set numpersonnepatient
     *
     * @param \GSB\PatientsBundle\Entity\Patient $numpersonnepatient
     * @return Dossier
     */
    public function setNumpersonnepatient(\GSB\PatientsBundle\Entity\Patient $numpersonnepatient = null)
    {
        $this->numpersonnepatient = $numpersonnepatient;
    
        return $this;
    }

    /**
     * Get numpersonnepatient
     *
     * @return \GSB\PatientsBundle\Entity\Patient 
     */
    public function getNumpersonnepatient()
    {
        return $this->numpersonnepatient;
    }
    
    /**
     * Get patient
     *
     * @return \GSB\PatientsBundle\Entity\Patient 
     */
    public function getPatient()
    {
        return $this->numpersonnepatient;
    }


    /**
     * Set numpersonneassure
     *
     * @param \GSB\PatientsBundle\Entity\Assure $numpersonneassure
     * @return Dossier
     */
    public function setNumpersonneassure(\GSB\PatientsBundle\Entity\Assure $numpersonneassure = null)
    {
        $this->numpersonneassure = $numpersonneassure;
    
        return $this;
    }

    /**
     * Get numpersonneassure
     *
     * @return \GSB\PatientsBundle\Entity\Assure 
     */
    public function getNumpersonneassure()
    {
        return $this->numpersonneassure;
    }

    /**
     * Set codecaisse
     *
     * @param \GSB\PatientsBundle\Entity\Caisse $codecaisse
     * @return Dossier
     */
    public function setCodecaisse(\GSB\PatientsBundle\Entity\Caisse $codecaisse = null)
    {
        $this->codecaisse = $codecaisse;
    
        return $this;
    }

    /**
     * Get codecaisse
     *
     * @return \GSB\PatientsBundle\Entity\Caisse 
     */
    public function getCodecaisse()
    {
        return $this->codecaisse;
    }

    /**
     * Set codemotif
     *
     * @param \GSB\PatientsBundle\Entity\Motifsortie $codemotif
     * @return Dossier
     */
    public function setCodemotif(\GSB\PatientsBundle\Entity\Motifsortie $codemotif = null)
    {
        $this->codemotif = $codemotif;
    
        return $this;
    }

    /**
     * Get codemotif
     *
     * @return \GSB\PatientsBundle\Entity\Motifsortie 
     */
    public function getCodemotif()
    {
        return $this->codemotif;
    }

    /**
     * Set codemedecinprescripteur
     *
     * @param \GSB\PatientsBundle\Entity\Medecin $codemedecinprescripteur
     * @return Dossier
     */
    public function setCodemedecinprescripteur(\GSB\PatientsBundle\Entity\Medecin $codemedecinprescripteur = null)
    {
        $this->codemedecinprescripteur = $codemedecinprescripteur;
    
        return $this;
    }

    /**
     * Get codemedecinprescripteur
     *
     * @return \GSB\PatientsBundle\Entity\Medecin 
     */
    public function getCodemedecinprescripteur()
    {
        return $this->codemedecinprescripteur;
    }

    /**
     * Set codemedecintraitant
     *
     * @param \GSB\PatientsBundle\Entity\Medecin $codemedecintraitant
     * @return Dossier
     */
    public function setCodemedecintraitant(\GSB\PatientsBundle\Entity\Medecin $codemedecintraitant = null)
    {
        $this->codemedecintraitant = $codemedecintraitant;
    
        return $this;
    }

    /**
     * Get codemedecintraitant
     *
     * @return \GSB\PatientsBundle\Entity\Medecin 
     */
    public function getCodemedecintraitant()
    {
        return $this->codemedecintraitant;
    }

    /**
     * Set codeorigine
     *
     * @param \GSB\PatientsBundle\Entity\Origine $codeorigine
     * @return Dossier
     */
    public function setCodeorigine(\GSB\PatientsBundle\Entity\Origine $codeorigine = null)
    {
        $this->codeorigine = $codeorigine;
    
        return $this;
    }

    /**
     * Get codeorigine
     *
     * @return \GSB\PatientsBundle\Entity\Origine 
     */
    public function getCodeorigine()
    {
        return $this->codeorigine;
    }
    
    public function __toString() {
        return $this->id." Patient : ". $this->numpersonnepatient;
    }
}