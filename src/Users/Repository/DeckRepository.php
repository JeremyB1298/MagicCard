<?php

namespace App\Users\Repository;

use App\Users\Entity\Deck;
use Doctrine\DBAL\Connection;

/**
 * Deck repository.
 */
class DeckRepository
{
	 protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function addDeck($parameters){ 
        $queryBuilder = $this->db->createQueryBuilder();
           $queryBuilder
             ->insert('deck')
             ->values(
                 array(
                   'cardId' => ':cardId',
                   'deckId' => ':deckId',
                   'userId' => ':userId',
                 )
             )
             ->setParameter(':cardId', $parameters['cardId'])
             ->setParameter(':deckId',$parameters['deckId'])
             ->setParameter(':userId', $parameters['userId']);
           $statement = $queryBuilder->execute();
           return true;
      }

}
