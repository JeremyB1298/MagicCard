<?php

$app->post('/inscription','App/Users/Controller/IndexController::addInscriptionAction')->bind('users.addInscription');