<?php

require('vendor/autoload.php');

use \WilliamCosta\DatabaseManager\Database;
use \App\Http\Middleware\Queue as MiddlewareQueue;

// LOAD AMBIENT VARS
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

// DEFAULT URL
define('URL',$_ENV['URL']);

// DEFAULT UPLOAD ROUTE
define('UPLOADS',$_ENV['UPLOADS']);

// DB INFOS
define('DB_DRIVE',$_ENV['DB_DRIVE']);
define('DB_HOST',$_ENV['DB_HOST']);
define('DB_USER',$_ENV['DB_USER']);
define('DB_PASS',$_ENV['DB_PASS']);
define('DB_NAME',$_ENV['DB_NAME']);

// MAINTENANCE STATUS
define('MAINTENANCE',$_ENV['MAINTENANCE']);

// DEFINE THE DB INFOS
Database::config(DB_HOST,DB_NAME,DB_USER,DB_PASS);

// DEFINE THE MIDDLEWARE MAP
MiddlewareQueue::setMap([
        'api' => \App\Http\Middleware\Api::class,
        'maintenance' => \App\Http\Middleware\Maintenance::class,
]);

// DEFINE THE DEFAULT MIDDLEWARE MAP
MiddlewareQueue::setDefault([
        'maintenance'
]);

