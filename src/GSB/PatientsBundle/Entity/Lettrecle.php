<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lettrecle
 *
 * @ORM\Table(name="LettreCle")
 * @ORM\Entity
 */
class Lettrecle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleLettreCle", type="string", length=50, nullable=false)
     */
    private $libellelettrecle;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", nullable=false)
     */
    private $tarif;



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
     * Set libellelettrecle
     *
     * @param string $libellelettrecle
     * @return Lettrecle
     */
    public function setLibellelettrecle($libellelettrecle)
    {
        $this->libellelettrecle = $libellelettrecle;
    
        return $this;
    }

    /**
     * Get libellelettrecle
     *
     * @return string 
     */
    public function getLibellelettrecle()
    {
        return $this->libellelettrecle;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     * @return Lettrecle
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    
        return $this;
    }

    /**
     * Get tarif
     *
     * @return float 
     */
    public function getTarif()
    {
        return $this->tarif;
    }
    
    public function __toString() {
        return '';
    }
}