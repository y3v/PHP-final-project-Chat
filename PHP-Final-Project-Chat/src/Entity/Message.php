<?php
# src/Entity/Message.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Message{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $authorUname;

     /**
     * @ORM\Column(type="string")
     */
    private $recipientUname;

     /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\Column(type="string")
     */
    private $message;

     /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;

     /**
     * @ORM\Column(type="boolean")
     */
    private $wasViewed;

    public function __construct($authorUname,$recipientUname,$timestamp,$message,$isDeleted,$wasViewed){
        $this->authorUname=$authorUname;
        $this->recipientUname=$recipientUname;
        $this->timestamp=$timestamp;
        $this->message=$message;
        $this->isDeleted=$isDeleted;
        $this->wasViewed=$wasViewed;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getauthorUname()
    {
        return $this->authorUname;
    }

    public function getrecipientUname()
    {
        return $this->recipientUname;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    public function getWasViewed()
    {
        return $this->wasViewed;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setauthorUname($authorUname)
    {
        $this->authorUname = $authorUname;
    }

    public function setrecipientUname($recipientUname)
    {
        $this->recipientUname = $recipientUname;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    public function setWasViewed($wasViewed)
    {
        $this->wasViewed = $wasViewed;
    }


}
