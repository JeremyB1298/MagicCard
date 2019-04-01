<?php

namespace App\Users\Entity;

class Deck implements \JsonSerializable
{
	protected $id;

	protected $name;

	protected $userId;

	public function __construct($id, $name, $userId){
		$this->id = $id;
		$this->name = $name;
		$this->userId = $userId;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getName(){
		return $this->name;
	}

	public function getId(){
		return $this->id;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['userId'] = $this->userId;

        return $array;
    }
        public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}