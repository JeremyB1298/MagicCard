<?php

$app->get('/facebookConnexion/{fbId}','App\Users\Controller\IndexController::fbConnexionAction')->bind('users.fbConnexion');
$app->get('/googleConnexion/{googleId}','App\Users\Controller\IndexController::googleConnexionAction')->bind('users.googleConnexion');

$app->post('/inscription','App\Users\Controller\IndexController::inscriptionAction')->bind('users.inscription');

$app->get('/magicCardApi/{cardId}','App\Users\Controller\IndexController::magicCardAction')->bind('users.magicCard');
//$app->get('/users','App\Users\Controller\IndexController::getUsersAction')->bind('users.getusers');
$app->get('/userCards/{id}','App\Users\Controller\IndexController::getUserCardsAction')->bind('users.getusercards');

$app->get('/shop/{nbrCards}','App\Users\Controller\IndexController::getShopCardsAction')->bind('users.getshopcards');