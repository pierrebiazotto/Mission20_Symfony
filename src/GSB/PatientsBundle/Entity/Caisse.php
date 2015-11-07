<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caisse
 *
 * @ORM\Table(name="Caisse")
 * @ORM\Entity
 */
class Caisse
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
     * @ORM\Column(name="nomCaisse", type="string", length=255, nullable=false)
     */
    private $nomcaisse;

    /**
     * @var string
     *
     * @ORM\Column(name="rueCaisse", type="string", length=255, nullable=false)
     */
    private $ruecaisse;

    /**
     * @var string
     *
     * @ORM\Column(name="villeCaisse", type="string", length=255, nullable=false)
     */
    private $villecaisse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostalCaisse", type="string", length=5, nullable=false)
     */
    private $codepostalcaisse;



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
     * Set nomcaisse
     *
     * @param string $nomcaisse
     * @return Caisse
     */
    public function setNomcaisse($nomcaisse)
    {
        $this->nomcaisse = $nomcaisse;
    
        return $this;
    }

    /**
     * Get nomcaisse
     *
     * @return string 
     */
    public function getNomcaisse()
    {
        return $this->nomcaisse;
    }

    /**
     * Set ruecaisse
     *
     * @param string $ruecaisse
     * @return Caisse
     */
    public function setRuecaisse($ruecaisse)
    {
        $this->ruecaisse = $ruecaisse;
    
        return $this;
    }

    /**
     * Get ruecaisse
     *
     * @return string 
     */
    public function getRuecaisse()
    {
        return $this->ruecaisse;
    }

    /**
     * Set villecaisse
     *
     * @param string $villecaisse
     * @return Caisse
     */
    public function setVillecaisse($villecaisse)
    {
        $this->villecaisse = $villecaisse;
    
        return $this;
    }

    /**
     * Get villecaisse
     *
     * @return string 
     */
    public function getVillecaisse()
    {
        return $this->villecaisse;
    }

    /**
     * Set codepostalcaisse
     *
     * @param string $codepostalcaisse
     * @return Caisse
     */
    public function setCodepostalcaisse($codepostalcaisse)
    {
        $this->codepostalcaisse = $codepostalcaisse;
    
        return $this;
    }

    /**
     * Get codepostalcaisse
     *
     * @return string 
     */
    public function getCodepostalcaisse()
    {
        return $this->codepostalcaisse;
    }
    
    public function __toString() {
        return '';
    }
}