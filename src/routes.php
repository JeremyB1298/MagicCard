<?php

//$app->post('/inscription','App\Users\Controller\IndexController::addInscriptionAction')->bind('users.addInscription');
//$app->post('/isUser/{idu}','App\Users\Controller\IndexController::isUserAction')->bind('users.isUser');

$app->get('/users','App\Users\Controller\IndexController::getUsersAction')->bind('users.getusers');
$app->get('/userCards/{id}','App\Users\Controller\IndexController::getUserCardsAction')->bind('users.getusercards');