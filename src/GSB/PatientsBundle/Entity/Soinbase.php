<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soinbase
 *
 * @ORM\Table(name="SoinBase")
 * @ORM\Entity
 */
class Soinbase
{
    /**
     * @var string
     *
     * @ORM\Column(name="tempEstime", type="string", length=20, nullable=false)
     */
    private $tempestime;

    /**
     * @var \Soin
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Soin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set tempestime
     *
     * @param string $tempestime
     * @return Soinbase
     */
    public function setTempestime($tempestime)
    {
        $this->tempestime = $tempestime;
    
        return $this;
    }

    /**
     * Get tempestime
     *
     * @return string 
     */
    public function getTempestime()
    {
        return $this->tempestime;
    }

    /**
     * Set id
     *
     * @param \GSB\PatientsBundle\Entity\Soin $id
     * @return Soinbase
     */
    public function setId(\GSB\PatientsBundle\Entity\Soin $id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return \GSB\PatientsBundle\Entity\Soin 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __toString() {
        return '';
    }
}