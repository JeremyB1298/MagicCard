<?php

namespace App\Users\Entity;

class Card implements \JsonSerializable
{
	protected $id;

	protected $cardId;

	protected $cardName;

	protected $userId;

	public function __construct($id, $cardId, $cardName, $userId){
		$this->id = $id;
		$this->cardId = $cardId;
		$this->cardName = $cardName;
		$this->userId = $userId;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setCardId($cardId){
		$this->cardId = $cardId;
	}

	public function setCardName($cardName){
		$this->cardName = $cardName;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function getId(){
		return $this->id;
	}

	public function getCardId(){
		return $this->cardId;
	}

	public function getCardName(){
		return $this->cardName;
	}

	public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['cardId'] = $this->cardId;
        $array['cardName'] = $this->cardName;
		$array['userId'] = $this->userId;

        return $array;
    }
        public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}