<?php

namespace App\Users\Entity;

class Deck implements \JsonSerializable
{
	protected $id;

	protected $cardId;

	protected $deckId;

	protected $userId;

	public function __construct($id, $cardId, $deckId, $userId){
		$this->id = $id;
		$this->cardId = $cardId;
		$this->deckId = $deckId;
		$this->userId = $userId;
	}

	public function setUserId($deckId) {
		$this->userId = $userId;
	}

	public function setDeckId($deckId){
		$this->deckId = $deckId;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setCardId($cardId){
		$this->cardId = $cardId;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function getDeckId(){
		return $this->deckId;
	}

	public function getId(){
		return $this->id;
	}

	public function getCardId(){
		return $this->cardId;
	}

	public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['cardId'] = $this->cardId;
		$array['deckId'] = $this->deckId;
		$array['userId'] = $this->userId;

        return $array;
    }
        public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}