<?php
# src/Entity/User.php

namespace Tuto\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $role;
    
    /**
     * @ORM\OneToOne(targetEntity=Address::Class)
     */
    protected $address;
    
    
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    
    public function getLastname()
    {
        return $this->lastname;
    }
    
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    
    public function getRole()
    {
        return $this->role;
    }
    
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    public function __toString(){
        $format ="User (id : %s, firstname: %s, lastname:%s, role:%s)";
        return sprintf($format, $this->id, $this->firstname, $this->lastname, $this->role);
    }
    
    /* @ORM\OneToOne(targetEntity=Address::Class) */
}