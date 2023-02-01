<?php

date_default_timezone_set('America/Sao_Paulo');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');

include('includes/app.php');

use \App\Http\Router;

// INIT ROUTER
$router = new Router(URL);

// INCLUDE API ROUTES
include('routes/api.php');

// PRINT RESPONSE OF ROUTE
$router->run()
        ->sendResponse();
