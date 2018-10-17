<?php

namespace App\Users\Entity;

class User
{
    protected $id;

    protected $idu;

    protected $name;

    protected $isNew;

    protected $email;

    public function __construct($id, $idu, $name, $email, $isNew)
    {
        $this->id = $id;
        $this->idu=$idu;
        $this->name=$name
        $this->email=$email
        $this->isNew=$isNew;
    }

    public function setIdu($idu)
    {
        $this->idu = $idu;
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
    public function getIdu()
    {
        return $this->idu;
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
        $array['idu'] = $this->idu;
        $array['name'] = $this->name;
        $array['email'] = $this->email;
        $array['isNew'] = $this->isNew;

        return $array;
    }
}
