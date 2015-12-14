<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soin
 * 
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"Soin" = "Soin", "Soinbase" = "Soinbase", "Sointechnique" = "Sointechnique" })
 */
class Soin 
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
     * @ORM\Column(name="libelleSoin", type="string", length=50, nullable=false)
     */
    private $libellesoin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Dossier", inversedBy="codesoin")
     * @ORM\JoinTable(name="Planifier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codeSoin", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numDossier", referencedColumnName="id", unique=true)
     *   }
     * )
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
     * Set libellesoin
     *
     * @param string $libellesoin
     * @return Soin
     */
    public function setLibellesoin($libellesoin)
    {
        $this->libellesoin = $libellesoin;
    
        return $this;
    }

    /**
     * Get libellesoin
     *
     * @return string 
     */
    public function getLibellesoin()
    {
        return $this->libellesoin;
    }

    /**
     * Add numdossier
     *
     * @param \GSB\PatientsBundle\Entity\Dossier $numdossier
     * @return Soin
     */
    public function addNumdossier(\GSB\PatientsBundle\Entity\Dossier $numdossier)
    {
        $this->numdossier[] = $numdossier;
    
        return $this;
    }

    /**
     * Remove numdossier
     *
     * @param \GSB\PatientsBundle\Entity\Dossier $numdossier
     */
    public function removeNumdossier(\GSB\PatientsBundle\Entity\Dossier $numdossier)
    {
        $this->numdossier->removeElement($numdossier);
    }

    /**
     * Get numdossier
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNumdossier()
    {
        return $this->numdossier;
    }
    
    public function __toString() {
        return $libellesoin.' dossier N°'.$numdossier;
    }
}