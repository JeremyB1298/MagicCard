<?php

namespace App\Users\Repository;

use App\Users\Entity\CardDeck;
use Doctrine\DBAL\Connection;

/**
 * Deck repository.
 */
class CardDeckRepository
{
	 protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function addCardDeck($parameters){ 
        $queryBuilder = $this->db->createQueryBuilder();
           $queryBuilder
             ->insert('carddeck')
             ->values(
                 array(
                   'cardId' => ':cardId',
                   'deckId' => ':deckId',
                 )
             )
             ->setParameter(':cardId', $parameters['cardId'])
             ->setParameter(':deckId',$parameters['deckId']);
           $statement = $queryBuilder->execute();
           return true;
      }
    public function getCardsByIdDeck($deckId){
      $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('carddeck', 'd')
            ->where('deckId = ?')
            ->setParameter(0,$deckId);
        $statement = $queryBuilder->execute();
        $cardsIdData = $statement->fetchAll();
        return $cardsIdData;
    }

    public function deleteCardsOfDeck($cardDeckId)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('carddeck')
          ->where('id = :id')
          ->setParameter(':id', $cardDeckId);

        $statement = $queryBuilder->execute();
    }

}
