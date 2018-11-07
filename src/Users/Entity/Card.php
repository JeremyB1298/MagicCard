<?php

namespace App\Users\Entity;

class Card implements \JsonSerializable
{
	protected $id;

	protected $cardId;

	protected $cardName;

	public function __construct($id, $cardId, $cardName){
		$this->id = $id;
		$this->cardId = $cardId;
		$this->cardName = $cardName;
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

        return $array;
    }
        public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}