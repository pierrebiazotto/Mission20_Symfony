<?php

namespace GSB\PatientsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assure
 * @ORM\Entity
 */
class Assure extends Personne
{
    

    public function __toString() {
        return '';
    }
}