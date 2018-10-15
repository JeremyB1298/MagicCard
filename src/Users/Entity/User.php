<?php

namespace App\Users\Entity;

class User
{
    protected $id;

    protected $login;

    protected $password;

    protected $isNew;

    protected $dateCreation;

    protected $email;

    public function __construct($id, $login, $password, $dateCreation, $email, $isNew)
    {
        $this->id = $id;
        $this->login=$login;
        $this->password=$password
        $this->dateCreation=$dateCreation
        $this->email=$email
        $this->isNew=$isNew;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
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
    public function getPassword()
    {
        return $this->password;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
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
        $array['login'] = $this->login;
        $array['password'] = $this->password;
        $array['dateCreation'] = $this->dateCreation;
        $array['email'] = $this->email;
        $array['isNew'] = $this->isNew;

        return $array;
    }
}
