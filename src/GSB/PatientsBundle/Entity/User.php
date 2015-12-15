<?php

namespace GSB\PatientsBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fosuser")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id; 
  
    public function getExpiresat()
    {
        return $this->expiresAt;
    }
    
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }
    
    
}