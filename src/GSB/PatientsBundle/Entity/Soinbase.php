<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soinbase
 *
 * @ORM\Entity
 */

class Soinbase extends Soin
{
    /**
     * @var string
     *
     * @ORM\Column(name="tempEstime", type="string", length=20, nullable=false)
     */
    private $tempestime;

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

    public function __toString() {
        return '';
    }
}