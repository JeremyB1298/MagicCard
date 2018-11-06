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
      $user = $app['repository.user']->getUserByFbId( intval($parameters['fbId']) );
      
      if(isset($user)){
         $jsonUser = json_encode($user);
         var_dump($jsonUser);
         die;

      }
      else{
         var_dump("fail");
         die;
      }
      
   }

   public function googleConnexionAction(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $user = $app['repository.user']->getUserByGoogleId( intval($parameters['googleId']));


      if(isset($user)){
         $jsonUser = json_encode($user);
         var_dump($jsonUser);
         die;

      }
      else{
         var_dump("fail");
         die;
      }
   }

   public function inscriptionAction(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $insert = $app['repository.user']->inscription($parameters);
      die;
   }

}
