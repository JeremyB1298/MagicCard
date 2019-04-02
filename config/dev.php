<?php
// Enable PHP Error level
error_reporting(E_ALL);
ini_set('display_errors', 'On');
// Enable debug mode
$app['debug'] = true;
// Doctrine (db)
$app['db.options'] = array(
   'dbname' => 'magiccard',
   'port' => '3306', // ''
   'user' => 'root', //root
   'driver' => 'pdo_mysql',
   'host' => 'localhost', 
    'password' => '',
);