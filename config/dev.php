<?php

// Enable PHP Error level
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Enable debug mode
$app['debug'] = true;

// Doctrine (db)
$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'host' => 'sql7.freemysqlhosting.net',
    'port' => '3306',
    'dbname' => 'sql7261249',
    'user' => 'sql7261249',
    'password' => 'BIHvt7yXUk',
);
