<?php

// Enable PHP Error level
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Enable debug mode
$app['debug'] = true;

// Doctrine (db)
$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'magiccard',
    'user' => 'root',
    'password' => 'root',
);
