<?php

namespace App\Controller\Api;

use App\Model\Entity\Photo as EntityPhoto;
use App\Utils\Utilities;
use \Exception;

class ApiPublic
{

    /**
     * Method to return all photos
     * @param Request $request
     * @return array
     */
    public static function getPhotos($request)
    {
        $photos = EntityPhoto::list();

        foreach($photos as $photo){
            $photo->date = date('d/m/Y',strtotime($photo->date));
        }

        return $photos;

    }

    public static function setPhoto($request)
    {

        $obUtilities = new Utilities;

        $postVars = $request->getPostVars();
        $postFiles = $request->getPostFiles();

        $legend = $postVars['legend'];
        $img = $postFiles['image'];

        // IMAGE VALIDATION
        if ($obUtilities->validateImage($img)) {
            $upload = $obUtilities->uploadFile($img, null);
        } else {
            throw new Exception("Sorry, the image size or type is not permited!", 400);
        }

        $obPhoto = new EntityPhoto;
        $obPhoto->img = UPLOADS."/".$upload;
        $obPhoto->legend = $legend;
        $obPhoto->date = date('Y-m-d');
        $obPhoto->register();

        return [
            'status' => true,
        ];
    }

    public static function deletePhoto($request, $id)
    {
        $obPhoto = EntityPhoto::getPhotoById($id);

        $obPhotoExp = explode("/",$obPhoto->img);

        $obPhotoImgPath = end($obPhotoExp);

        // DELETE PHOTO
        EntityPhoto::delete($obPhoto,$obPhotoImgPath);

        // RETURN DELETE SUCCESS
        return [
            'status' => true,
        ];
    }
}
