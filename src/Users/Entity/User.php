<?php

namespace App\Users\Entity;

class User implements \JsonSerializable
{
    protected $id;

    protected $fbId;

    protected $googleId;

    protected $name;

    protected $isNew;

    protected $email;

    public function __construct($id, $fbId, $googleId, $name, $email, $isNew)
    {
        $this->id = $id;
        $this->fbId = $fbId;
        $this->googleId = $googleId;
        $this->name = $name;
        $this->email = $email;
        $this->isNew = $isNew;
    }

    public function setFbId($fbId)
    {
        $this->fbId = $fbId;
    }

    public function setGoogleId($googleId){
        $this->googleId = $googleId;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setIsNew($isNew){

        $this->isNew=$isNew;

    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getFbId()
    {
        return $this->fbId;
    }
    public function getGoogleId(){
        return $this->googleId;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getIsNew()
    {
        return $this->isNew;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['fbId'] = $this->fbId;
        $array['googleId'] = $this->googleId;
        $array['name'] = $this->name;
        $array['email'] = $this->email;
        $array['isNew'] = $this->isNew;

        return $array;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
