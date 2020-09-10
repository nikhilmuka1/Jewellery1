<?php

/**
 * Nj-Man
 *
 * Copyright (c) 2014 - 2015, Nj Solutions
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * @project	Nj Solutions
 * @author	Nj Solutions
 * @copyright	Copyright (c) 2008 - 2014, Nj Solutions
 * @link	http://www.neerjarseniya.com
 * @since	Version 1.0.0
 */
/* This funtion is created for the database functions */

class njFile {
    
    public function for_image_save_update($img,$UPLOAD_DIR)
    {
        $uniqueId = uniqid();
        $img = $img;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = $UPLOAD_DIR . $uniqueId . '.png';
        $success = file_put_contents($file, $data);
        return $uniqueId . '.png';
    }
    
    
    public function insertMobileImage($image, $filename, $pathToSave) {
        $sr = base64_decode($image);
        $file_name = '';
        if ($sr != '') {
            /* file_put_contents($pathToSave.$filename.'.png', $sr); */
            $file_name = $pathToSave . $filename . '.png';
            imagepng(imagecreatefromstring($sr), $file_name);
        }
        return $file_name;
    }

    public function getImageExtention($filename) {
        list($width, $height, $type, $attr) = getimagesize($filename);
        $ext = '';
        switch ($type) {
            case IMAGETYPE_GIF:
                $ext = '.gif';
                break;
            case IMAGETYPE_JPEG:
                $ext = '.jpg';
                break;
            case IMAGETYPE_PNG:
                $ext = '.png';
                break;
            default:
                die('The file you uploaded was not a found or not supported filetype.');
        }
        return $ext;
    }
    
    public function checkImage($image) {
        if ($image['error'] != UPLOAD_ERR_OK) {
            switch ($image['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    die('Error : The uploaded file exceeds the upload_max_filesize directive ' . 'in php.ini.');
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    die('Error : The uploaded file exceeds the MAX_FILE_SIZE directive that ' . 'was specified in the HTML form.');
                    break;
                case UPLOAD_ERR_PARTIAL:
                    die('Error : The uploaded file was only partially uploaded.');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    die('Error : No file was uploaded.');
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    die('Error : The server is missing a temporary folder.');
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    die('Error : The server failed to write the uploaded file to disk.');
                    break;
                case UPLOAD_ERR_EXTENSION:
                    die('Error : File upload stopped by extension.');
                    break;
            }
        } else {
            list($width, $height, $type, $attr) = getimagesize($image['tmp_name']);
            switch ($type) {
                case IMAGETYPE_GIF:
                    $image_main = imagecreatefromgif($image['tmp_name']) or die('The file you uploaded was not a supported filetype.');
                    $ext = '.gif';
                    break;
                case IMAGETYPE_JPEG:
                    $image_main = imagecreatefromjpeg($image['tmp_name']) or die('The file you uploaded was not a supported filetype.');
                    $ext = '.jpg';
                    break;
                case IMAGETYPE_PNG:
                    $image_main = imagecreatefrompng($image['tmp_name']) or die('The file you uploaded was not a supported filetype.');
                    $ext = '.png';
                    break;
                default:
                    die('Error : The file you uploaded was not a supported filetype.');
            } 
            return 'nj';
        }
        //return FALSE;
    }
    
    public function uploadImage($image, $filename, $pathToSave) {
        if ($image['error'] != UPLOAD_ERR_OK) {
            switch ($image['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    die('Error : The uploaded file exceeds the upload_max_filesize directive ' . 'in php.ini.');
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    die('Error : The uploaded file exceeds the MAX_FILE_SIZE directive that ' . 'was specified in the HTML form.');
                    break;
                case UPLOAD_ERR_PARTIAL:
                    die('Error : The uploaded file was only partially uploaded.');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    die('Error : No file was uploaded.');
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    die('Error : The server is missing a temporary folder.');
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    die('Error : The server failed to write the uploaded file to disk.');
                    break;
                case UPLOAD_ERR_EXTENSION:
                    die('Error : File upload stopped by extension.');
                    break;
            }
        } else {
            list($width, $height, $type, $attr) = getimagesize($image['tmp_name']);
            switch ($type) {
                case IMAGETYPE_GIF:
                    $image_main = imagecreatefromgif($image['tmp_name']) or die('The file you uploaded was not a supported filetype.');
                    $ext = '.gif';
                    break;
                case IMAGETYPE_JPEG:
                    $image_main = imagecreatefromjpeg($image['tmp_name']) or die('The file you uploaded was not a supported filetype.');
                    $ext = '.jpg';
                    break;
                case IMAGETYPE_PNG:
                    $image_main = imagecreatefrompng($image['tmp_name']) or die('The file you uploaded was not a supported filetype.');
                    $ext = '.png';
                    break;
                default:
                    die('Error : The file you uploaded was not a supported filetype.');
            }
            //save the image to its final destination
            $destination = $pathToSave . $filename . $ext;
            //chmod($pathToSave, "0755");
            //chmod($destination, "644");
            switch ($type) {
                case IMAGETYPE_GIF:
                    //$tmp = imagecreatetruecolor($width, $height);
                    imagealphablending($image_main, false);
                    imagesavealpha($image_main, true);
                    $transparent = imagecolorallocatealpha($image_main, 255, 255, 255, 127);
                    imagegif($image_main, $destination);
                    break;
                case IMAGETYPE_JPEG:
                    imagejpeg($image_main, $destination, 100);
                    break;
                case IMAGETYPE_PNG:
                    //$tmp = imagecreatetruecolor($width, $height);
                    imagealphablending($image_main, false);
                    imagesavealpha($image_main, true);
                    $transparent = imagecolorallocatealpha($image_main, 255, 255, 255, 127);
                    imagepng($image_main, $destination);
                    break;
            }
            imagedestroy($image_main);
            $return = $filename . $ext;
            return $return;
        }
        //return FALSE;
    }

    public function resizeImage($image_source, $img_name, $dest_path, $width = 250, $height = 250) {
        /* Get original file size */
        //$image_source = $dest_path . $image_source;
        //chmod($image_source, "0644");
        list($w, $h, $type, $attr) = getimagesize($image_source);
        /* Calculate new image size */
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* set new file name */
        $path = $dest_path . $img_name;
        /* Save image */
        switch ($type) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($image_source);
                $tmp = imagecreatetruecolor($width, $height);
                imagealphablending($tmp, false);
                imagesavealpha($tmp, true);
                $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
                imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
                imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                imagegif($tmp, $path . '.gif', 0);
                imagedestroy($image);
                imagedestroy($tmp);
                $img_name1 = $img_name . ".gif";
                break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($image_source);
                $tmp = imagecreatetruecolor($width, $height);
                imagealphablending($tmp, false);
                imagesavealpha($tmp, true);
                imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                imagejpeg($tmp, $path . '.jpg', 100);
                imagedestroy($image);
                imagedestroy($tmp);
                $img_name1 = $img_name . ".jpg";
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($image_source);
                $tmp = imagecreatetruecolor($width, $height);
                imagealphablending($tmp, false);
                imagesavealpha($tmp, true);
                $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
                imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
                imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                imagepng($tmp, $path . '.png', 0);
                imagedestroy($image);
                imagedestroy($tmp);
                $img_name1 = $img_name . ".png";
                break;
        }
        return $img_name1;
    }

    public function uploadSongsTrack($track, $filename, $pathToSave) {
        if ($track['error'] != UPLOAD_ERR_OK) {
            switch ($track['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    die('The uploaded file exceeds the upload_max_filesize directive ' . 'in php.ini.');
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    die('The uploaded file exceeds the MAX_FILE_SIZE directive that ' . 'was specified in the HTML form.');
                    break;
                case UPLOAD_ERR_PARTIAL:
                    die('The uploaded file was only partially uploaded.');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    die('No file was uploaded.');
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    die('The server is missing a temporary folder.');
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    die('The server failed to write the uploaded file to disk.');
                    break;
                case UPLOAD_ERR_EXTENSION:
                    die('File upload stopped by extension.');
                    break;
            }
        } else {
            $destination = '';
            if ($track['type'] != 'audio/mp3') {
                die("Upload Only MP3!!");
            } else {
                $destination = $pathToSave . $filename . ".mp3";
                move_uploaded_file($track['tmp_name'], $destination) or die("Error in uploading mp3 file");
                return true;
            }
            //$return = $destination;
            return false;
        }
        return false;
    }

}
