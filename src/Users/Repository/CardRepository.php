<?php

namespace App\Users\Repository;

use App\Users\Entity\Card;
use Doctrine\DBAL\Connection;

/**
 * Card repository.
 */
class CardRepository
{
	 protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getCardById($id){
    	$queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('c.*')
            ->from('card', 'c')
            ->where('cardId = ?')
            ->setParameter(0, $id);
        $statement = $queryBuilder->execute();
        $cardData = $statement->fetchAll();
        return new Card($cardData[0]['id'],$cardData[0]['cardId'], $cardData[0]['cardName'], $cardData[0]['userId']);
    }

    public function getCardByCardId($cardId){
    	$queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('c.*')
            ->from('card', 'c')
            ->where('cardId = ?')
            ->setParameter(0, $cardId);
        $statement = $queryBuilder->execute();
        $cardData = $statement->fetchAll();
        die;
    }

    public function getCardsIdByIdDeck($deckId){
      $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('d.cardId')
            ->from('deck', 'd')
            ->where('deckId = ?')
            ->setParameter(0,$deckId);
        $statement = $queryBuilder->execute();
        $cardsIdData = $statement->fetchAll();
        return $cardsIdData;
    }

    public function addCard($parameters){ 
        $queryBuilder = $this->db->createQueryBuilder();
           $queryBuilder
             ->insert('card')
             ->values(
                 array(
                   'cardId' => ':cardId',
                   'cardName' => ':cardName',
                   'userId' => ':userId',
                 )
             )
             ->setParameter(':cardId', $parameters['cardId'])
             ->setParameter(':cardName',$parameters['cardName'])
             ->setParameter(':userId',$parameters['userId']);
           $statement = $queryBuilder->execute();
           return true;
      }

      public function addUserCard($parameters){ 
        $queryBuilder = $this->db->createQueryBuilder();
           $queryBuilder
             ->insert('usercards')
             ->values(
                 array(
                   'cardId' => ':cardId',
                   'userId' => ':userId',
                 )
             )
             ->setParameter(':cardId', $parameters['cardId'])
             ->setParameter(':userId',$parameters['userId']);
           $statement = $queryBuilder->execute();
           return true;
      }

}
