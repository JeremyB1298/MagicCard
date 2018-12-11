<?php

namespace App\Users\Repository;

use App\Users\Entity\User;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class UserRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   // /**
   //  * Returns a collection of users.
   //  *
   //  * @param int $limit
   //  *   The number of users to return.
   //  * @param int $offset
   //  *   The number of users to skip.
   //  * @param array $orderBy
   //  *   Optionally, the order by info, in the $column => $direction format.
   //  *
   //  * @return array A collection of users, keyed by user id.
   //  */
   // public function getAll()
   // {
   //     $queryBuilder = $this->db->createQueryBuilder();
   //     $queryBuilder
   //         ->select('u.*')
   //         ->from('users', 'u');

   //     $statement = $queryBuilder->execute();
   //     $usersData = $statement->fetchAll();
   //     foreach ($usersData as $userData) {
   //         $userEntityList[$userData['id']] = new User($userData['id'], $userData['nom'], $userData['prenom']);
   //     }

   //     return $userEntityList;
   // }

   // /**
   //  * Returns an User object.
   //  *
   //  * @param $id
   //  *   The id of the user to return.
   //  *
   //  * @return array A collection of users, keyed by user id.
   //  */
   // public function getById($id)
   // {
   //     $queryBuilder = $this->db->createQueryBuilder();
   //     $queryBuilder
   //         ->select('u.*')
   //         ->from('users', 'u')
   //         ->where('id = ?')
   //         ->setParameter(0, $id);
   //     $statement = $queryBuilder->execute();
   //     $userData = $statement->fetchAll();

   //     return new User($userData[0]['id'], $userData[0]['nom'], $userData[0]['prenom']);
   // }

   //  public function delete($id)
   //  {
   //      $queryBuilder = $this->db->createQueryBuilder();
   //      $queryBuilder
   //        ->delete('users')
   //        ->where('id = :id')
   //        ->setParameter(':id', $id);

   //      $statement = $queryBuilder->execute();
   //  }

   //  public function update($parameters)
   //  {
   //      $queryBuilder = $this->db->createQueryBuilder();
   //      $queryBuilder
   //        ->update('users')
   //        ->where('id = :id')
   //        ->setParameter(':id', $parameters['id']);

   //      if ($parameters['nom']) {
   //          $queryBuilder
   //            ->set('nom', ':nom')
   //            ->setParameter(':nom', $parameters['nom']);
   //      }

   //      if ($parameters['prenom']) {
   //          $queryBuilder
   //          ->set('prenom', ':prenom')
   //          ->setParameter(':prenom', $parameters['prenom']);
   //      }

   //      $statement = $queryBuilder->execute();
   //  }

   //  public function insert($parameters)
   //  {
   //      $queryBuilder = $this->db->createQueryBuilder();
   //      $queryBuilder
   //        ->insert('users')
   //        ->values(
   //            array(
   //              'nom' => ':nom',
   //              'prenom' => ':prenom',
   //            )
   //        )
   //        ->setParameter(':nom', $parameters['nom'])
   //        ->setParameter(':prenom', $parameters['prenom']);
   //      $statement = $queryBuilder->execute();
   //  }

    public function inscriptionUser($parameters){
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('user')
          ->values(
              array(
                'login' => ':login',
                'password' => ':password',
                'isNew'=>'isNew',
                'dateCreation'=>'dateCreation',
                'email'=>'email',
              )
          )
          ->setParameter(':login', $parameters['login'])
          ->setParameter(':password', $parameters['password'])
          ->setParameter(':isNew', $parameters['isNew'])
          ->setParameter(':dateCreation', $parameters['dateCreation'])
          ->setParameter(':email', $parameters['email']);
        $statement = $queryBuilder->execute();

    }

    public function getUser($idu){

      $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('users', 'u')
           ->where('idu = ?')
           ->setParameter(0, $idu);
       $statement = $queryBuilder->execute();
       $userData = $statement->fetchAll();

       return new User($userData[0]['id'], $userData[0]['idu'], $userData[0]['name'], $userData[0]['email'], $userData[0]['isNew']);

    }

    public function getUserByFbId($fbId){
      $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('users', 'u')
           ->where('fbId = ?')
           ->setParameter(0, $fbId);
       $statement = $queryBuilder->execute();
       $userData = $statement->fetchAll();

       if ( $userData != null ) {
          if ( $userData[0]['googleId'] != null) {
            //account with fbId and googleId
            return new User($userData[0]['id'], $userData[0]['fbId'], $userData[0]['googleId'], $userData[0]['name'], $userData[0]['isNew']);
          }
            //account with fbId but not with googleId
         return new User($userData[0]['id'], $userData[0]['fbId'], -1, $userData[0]['name'], $userData[0]['isNew']);
       }
       //No account with fbId
       return null;
       
    }

    public function getUserByGoogleId($googleId){
      $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('users', 'u')
           ->where('googleId = ?')
           ->setParameter(0, $googleId);
       $statement = $queryBuilder->execute();
       $userData = $statement->fetchAll();
       if ( $userData != null ) {
          if ( $userData[0]['fbId'] != null) {
            //account with fbId and googleId
            return new User($userData[0]['id'], $userData[0]['fbId'], $userData[0]['googleId'], $userData[0]['name'], $userData[0]['isNew']);
          }
            //account with fbId but not with googleId
         return new User($userData[0]['id'], -1, $userData[0]['googleId'], $userData[0]['name'], $userData[0]['isNew']);
       }
       //No account with fbId
       return null;
       
    }

    public function inscriptionGoogle($parameters){
      $queryBuilder = $this->db->createQueryBuilder();
         $queryBuilder
           ->insert('users')
           ->values(
               array(
                 'googleId' => ':googleId',
                 'fbId' => -1,
                 'name' => ':name',
                 'isNew' => 1,
               )
           )
           ->setParameter(':googleId', $parameters['googleid'])
           ->setParameter(':name',$parameters['name']);
         $statement = $queryBuilder->execute();
         return true;
    }




    public function getCardsByIdUser($id){
      $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('uc.*')
            ->from('usercards', 'uc')
            ->where('userId = ?')
            ->setParameter(0, $id);
        $statement = $queryBuilder->execute();
        $userCardsData = $statement->fetchAll();
        return $userCardsData;
    }
}
