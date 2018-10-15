<?php

$app->get('/inscription','App/Users/Controller/IndexController::addInscriptionAction')->bind('users.addInscription');