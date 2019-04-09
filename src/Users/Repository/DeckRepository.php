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
                   'name' => ':name',
                   'userId' => ':userId',
                 )
             )
             ->setParameter(':name', $parameters['name'])
             ->setParameter(':userId',$parameters['userId']);
           $statement = $queryBuilder->execute();
           return true;
      }

    public function updateDeck($parameters){ 
               $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('deck')
          ->where('id = :id')
          ->set('name',':name')
          ->set('userId',':userId')
          ->setParameter(':id', $parameters['id'])
          ->setParameter(':name', $parameters['name'])
          ->setParameter(':userId',$parameters['userId']);

        $statement = $queryBuilder->execute();
      }

        public function getDecksIdByIdUser($id){
      $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('deck', 'd')
            ->where('userId = ?')
            ->setParameter(0, $id);
        $statement = $queryBuilder->execute();
        $userDecksData = $statement->fetchAll();
        return $userDecksData;
    }

     public function getDeckIdByIdUserAndName($parameters){
      $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('DISTINCT d.id')
            ->from('deck', 'd')
            ->where('userId = ? AND name = ?')
            ->setParameter(0, $parameters['userId'])
            ->setParameter(1, $parameters['name']);
        $statement = $queryBuilder->execute();
        $userDeckData = $statement->fetchAll();
        return $userDeckData;
    }

        public function deleteDeckById($deckId)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('deck')
          ->where('id = :id')
          ->setParameter(':id', $deckId);

        $statement = $queryBuilder->execute();
    }
}
