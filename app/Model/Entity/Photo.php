<?php

namespace App\Model\Entity;

use WilliamCosta\DatabaseManager\Database;
use App\Utils\Utilities;

class Photo{

    /**
     * Photo id
     * @var int
     */
    public $id;

    /**
     * Photo image name
     * @var string
     */
    public $img;

    /**
     * Photo legend
     * @var string
     */
    public $legend;

    /**
     * Photo post date
     * @var string
     */
    public $date;

    /**
     * Photo url
     * @var string
     */
    public $url;

    /**
     * Method to get an photo by id
     * @param int $id
     * @return Photo
     */
    public static function getPhotoById($id){

        return (new Database('photos'))->select('id = '.$id)->fetch();

    }

    /**
     * Method to list all photos
     * @return Photos
     */
    public static function list(){

        return (new Database('photos'))->select(null,'id DESC')->fetchAll();

    }

    /**
     * Method to register a photo
     * @return boolean
     */
    public function register()
    {
        // INSERT PHOTO IN DB
        $this->id = (new Database('photos'))->insert([
            'legend' => $this->legend,
            'img' => $this->img,
            'date' => date('Y-m-d'),
        ]);

        return true;
    }

    public static function delete($obPhoto){
        // DELETE PRODUCT IMAGE
        Utilities::deleteFile($obPhoto["img"], null);
        // DELETE PRODUCT
        return (new Database('photos'))->delete('id = ' . $obPhoto["id"]);
    }
}