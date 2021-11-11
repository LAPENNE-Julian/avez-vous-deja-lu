<?php 

namespace App\Utils;

/**
 * Convert an base 64 string to an image.
 */
class ApiBase64ToImg {

    /**
     * Create an avatar file.
     *
     * @param b64Data|string $base64String
     * @return img $newAvatarFile
     */
    function convertToImg($base64String, $absolutePathFile ) {

        //create a new avatar file in directory chosen in $absolutePathFile
        $newAvatarFile = fopen($absolutePathFile, "wb"); 
        //write img data in the new avatar file
        fwrite($newAvatarFile, base64_decode($base64String));
        //close the new avatar file
        fclose($newAvatarFile); 

        return($newAvatarFile); 
    }

}