<?php

namespace App\Users\Entity;

class User implements \JsonSerializable
{
    protected $id;

    protected $fbId;

    protected $googleId;

    protected $name;

    protected $isNew;

    protected $lvl;

    protected $exp;

    public function __construct($id, $fbId, $googleId, $name, $isNew, $lvl, $exp)
    {
        $this->id = $id;
        $this->fbId = $fbId;
        $this->googleId = $googleId;
        $this->name = $name;
        $this->isNew = $isNew;
        $this->lvl = $lvl;
        $this->exp = $exp;
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

        return $array;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
