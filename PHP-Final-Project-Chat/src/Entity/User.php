<?php
# src/Entity/User.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class User{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\Column(type="string")
     */
    private $username;
    
     /**
     * @ORM\Column(type="string")
     */
    private $password;
    
     /**
     * @ORM\Column(type="string")
     */
    private $firstname;
    
     /**
     * @ORM\Column(type="string")
     */
    private $lastname;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $isLoggedOn;
    
    public function __construct($username, $password, $firstname, $lastname, $log){
        $this->username = $username;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->isLoggedOn = $log;
    }

    
    public function getId()
    {
        return $this->id;
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getIsLoggedOn()
    {
        return $this->isLoggedOn;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setIsLoggedOn($isLoggedOn)
    {
        $this->isLoggedOn = $isLoggedOn;
    }
    
}