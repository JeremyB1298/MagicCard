<?php

$app->get('/facebookConnexion/{fbId}','App\Users\Controller\IndexController::fbConnexionAction')->bind('users.fbConnexion');
$app->get('/googleConnexion/{googleId}','App\Users\Controller\IndexController::googleConnexionAction')->bind('users.googleConnexion');

$app->post('/inscription/{fbId}/{googleId}/{name}/{email}','App\Users\Controller\IndexController::inscriptionAction')->bind('users.inscription');
