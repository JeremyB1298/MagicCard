<?php

namespace App\Users\Entity;

class Friend implements \JsonSerializable
{
	protected $id;

	protected $userId;

	protected $friendId;

	public function __construct($id, $userId, $friendId){
		$this->id = $id;
		$this->userId = $userId;
		$this->friendId = $friendId;
	}

	public function setFriendId($friendId){
		$this->friendId = $friendId;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getFriendId(){
		return $this->friendId;
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
        $array['userId'] = $this->userId;
		$array['friendId'] = $this->friendId;

        return $array;
    }
        public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}