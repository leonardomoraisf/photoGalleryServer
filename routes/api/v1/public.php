<?php

use \App\Http\Response;
use \App\Controller\Api;

// API PUBLIC ROUTE
$router->get('/api/v1/photos',[
    'middlewares' => [
        'api',
    ],
    function($request){
        return new Response(200,Api\ApiPublic::getPhotos($request),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->post('/api/v1/photos/upload',[
    'middlewares' => [
        'api',
    ],
    function($request){
        return new Response(200,Api\ApiPublic::setPhoto($request),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->delete('/api/v1/photo/{id}/delete',[
    'middlewares' => [
        'api',
    ],
    function($request,$id){
        return new Response(200,Api\ApiPublic::deletePhoto($request,$id),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->options('/api/v1/photo/{id}/delete',[
    'middlewares' => [
        'api',
    ],
    function($request,$id){
        return new Response(200,Api\ApiPublic::deletePhoto($request,$id),'application/json');
    }
]);

