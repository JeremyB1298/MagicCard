<?php

namespace App\Users\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
   //  public function listAction(Request $request, Application $app)
   //  {
   //      $users = $app['repository.user']->getAll();

   //      return $app['twig']->render('users.list.html.twig', array('users' => $users));
   // }

   //   public function deleteAction(Request $request, Application $app)
   //   {
   //       $parameters = $request->attributes->all();
   //       $app['repository.user']->delete($parameters['id']);

   //       return $app->redirect($app['url_generator']->generate('users.list'));
   //   }

   //   public function editAction(Request $request, Application $app)
   //   {
   //       $parameters = $request->attributes->all();
   //       $user = $app['repository.user']->getById($parameters['id']);

   //       return $app['twig']->render('users.form.html.twig', array('user' => $user));
   //   }

   //   public function saveAction(Request $request, Application $app)
   //   {
   //       $parameters = $request->request->all();
   //       if ($parameters['id']) {
   //           $user = $app['repository.user']->update($parameters);
   //       } else {
   //           $user = $app['repository.user']->insert($parameters);
   //       }

   //       return $app->redirect($app['url_generator']->generate('users.list'));
   //   }

   //   public function newAction(Request $request, Application $app)
   //   {
   //       return $app['twig']->render('users.form.html.twig');
   //   }

   public function fbConnexionAction(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $user = $app['repository.user']->getUserByFbId( $parameters['fbId'] );
      
      if(isset($user)){
         $jsonUser = json_encode($user);
         return $jsonUser;
      }
      else{
         die;
      }
      
   }

   public function googleConnexionAction(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $user = $app['repository.user']->getUserByGoogleId($parameters['googleId']);
      if(isset($user)){
         $jsonUser = json_encode($user);
         return $jsonUser;

      }
      else{
         die;
      }
   }

   public function inscriptionGoogleAction(Request $request, Application $app){
      $parameters = json_decode( $request->getContent(), true);
      $insert = $app['repository.user']->inscriptionGoogle($parameters);
      return "OK";
   }

   public function inscriptionFacebookAction(Request $request, Application $app){
      $parameters = json_decode( $request->getContent(), true);
      $insert = $app['repository.user']->inscriptionFacebook($parameters);
      return "OK";
   }

   public function addCardAction(Request $request, Application $app){
      $parameters = json_decode( $request->getContent(), true);
      $insert = $app['repository.card']->addCard($parameters);
      return "OK";
   }

   public function addUserCardAction(Request $request, Application $app){
      $parameters = json_decode( $request->getContent(), true);
      $insert = $app['repository.card']->addUserCard($parameters);
      return "OK";
   }

   public function magicCardAction(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $response = file_get_contents("https://api.magicthegathering.io/v1/cards/44");
      $response = json_decode($response);
      var_dump($response);
      die;
   }
 
   public function randomCardAction(Request $request, Application $app){

      $tabCards = array(); 
      for($i = 0; $i < 4; $i++ ) {
         $itemCard = file_get_contents('https://api.scryfall.com/cards/random?q=lang%3Dfr');
         $itemCard = json_decode($itemCard, true);
         array_push($tabCards, $itemCard);
      }
      return json_encode($tabCards);
    }
    
    public function getUsersAction(Request $request, Application $app){

      $users = $app['repository.user']->getAll();
      var_dump($users);
      die;
    }
    public function getUserCardsAction(Request $request, Application $app){
       $parameters = $request->attributes->all();
      $cardsId=$app['repository.user']->getCardsByIdUser($parameters['id']);
      $tabCards = array(); 
      foreach ($cardsId as $cardId) {
         $card = $app['repository.card']->getCardById($cardId['cardId']);
         $itemCard = file_get_contents('https://api.scryfall.com/cards/' . $card->getCardId());
         $itemCard = json_decode($itemCard, true);
         array_push($tabCards, $itemCard);
      }
      return json_encode($tabCards);
    }

    public function getShopCardsAction(Request $request, Application $app) {
      $parameters = $request->attributes->all();
      $nbrCard = intval($parameters['nbrCards']);
      $cardsId = array();
      for ($i=0; $i < $nbrCard; $i++) { 
         array_push($cardsId, rand(1, 100));
      }
      $cards = array();
      foreach ($cardsId as $cardId) {
         $itemCard = file_get_contents('https://api.magicthegathering.io/v1/cards/' . $cardId);
         $itemCard = json_decode($itemCard, true);
         array_push($cards, $itemCard);
      }
      return json_encode($cards);
    }

    public function updateAccountAction(Request $request, Application $app){
      $parameters = json_decode( $request->getContent(), true);
      return json_encode($parameters);
   }

}
