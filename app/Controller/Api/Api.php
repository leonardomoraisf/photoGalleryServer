<?php

namespace App\Controller\Api;

class Api{

    /**
     * Method to return api details
     * @param Request $request
     * @return array
     */
    public static function getDetails($request){

        return[
            'name' => 'API - Photo-Gallery',
            'version' => 'v1.0.0',
            'author' => 'Leonardo Morais Franca',
            'email' => 'mfrancaleonardo@gmail.com',
        ];

    }

}