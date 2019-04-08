<?php

namespace App\Users\Repository;

use App\Users\Entity\Friend;
use Doctrine\DBAL\Connection;

/**
 * Deck repository.
 */
class FriendRepository
{
	 protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

}
