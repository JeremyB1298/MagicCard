<?php

$app->post('/inscription','App\Users\Controller\IndexController::addInscriptionAction')->bind('users.addInscription');
$app->post('/isUser/{idu}','App\Users\Controller\IndexController::isUserAction')->bind('users.isUser');