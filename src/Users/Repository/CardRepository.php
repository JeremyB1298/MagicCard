<?php

namespace App\Users\Repository;

use App\Users\Entity\Card;
use Doctrine\DBAL\Connection;

/**
 * User repository.
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
            ->where('id = ?')
            ->setParameter(0, $id);
        $statement = $queryBuilder->execute();
        $cardData = $statement->fetchAll();
        return $cardData;
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
        var_dump($cardData);
        die;
    }

}
