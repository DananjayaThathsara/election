<?php
error_reporting(0);
class fileUploadClass {

    private $uploaddir;
    private $filename;

    public function getUploaddir() {
        return $this->uploaddir;
    }

    public function setUploaddir($uploaddir) {
        $this->uploaddir = $uploaddir;
    }

    public function getFilename() {
        return $this->filename;
    }

    public function setFilename($filename) {
        $this->filename = $filename;
    }

    function generateRandomString() {
        $dataetag = date("YmdHis");
        $length = 30;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $randomString .=$dataetag;
        return $randomString;
    }

    public function singleFileUpload($files, $filestemp, $uploaddir) {
        $filename = basename($files);
        $filesize = filesize($filestemp);
        $extension = strtolower(pathinfo($files, PATHINFO_EXTENSION));

        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif") && ($extension != "pdf") &&($extension != "doc")&& ($extension != "xml") && ($extension != "docx") && ($extension != "xls") && ($extension != "xlsx")) {
            throw new Exception('Unknown file extension (Allowed file extensions:  .pdf, .doc*, .xls*, .jpg, .png, .gif).');
        } else if ($filesize > 2000 * 1024) {
            throw new Exception('You have exceeded the size limit! (file cannot exceed 2 Mb).');
        } else {
            //generate name as random String with date tag
            $randstring = $this->generateRandomString();
            $uploadfile = $uploaddir . $files;

            $this->setFilename($files);
            $this->setUploaddir($uploadfile);

            if (move_uploaded_file($filestemp, $uploadfile)) {
                //echo "File is valid, and was successfully uploaded.";
            } else {
                throw new Exception('File uploading failed. Please try again later');
            }
        }
        return true;
    }

    public function singleImageUpload($files, $filestemp, $uploaddir, $with_limit, $hight_limit) {
        $filesize = filesize($filestemp);
        $extension = strtolower(pathinfo($files, PATHINFO_EXTENSION));

        //get image Width and Height in px
        list($width, $height, $type, $attr) = getimagesize($filestemp);

        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
            throw new Exception('Unknown file extension (Allowed file extensions: .jpg, .png, .gif).');
        }
        if ($filesize > 2000 * 1024) {
            throw new Exception('You have exceeded the size limit! (file cannot exceed 2 Mb).');
        } else if ($with_limit != 'any' && $width != $with_limit && $hight_limit != 'any' && $height != $hight_limit) {
            throw new Exception('Image width should be ' . $with_limit . 'px and Image height should be ' . $hight_limit . 'px');
        } 
           
        else {
            //generate name as random String with date tag
            $randstring = $this->generateRandomString();
            $uploadfile = $uploaddir . $randstring . '.' . $extension;

            $this->setFilename($randstring . '.' . $extension);
            $this->setUploaddir($uploadfile);

            if (move_uploaded_file($filestemp, $uploadfile)) {
                //echo "File is valid, and was successfully uploaded.";
            } else {
                throw new Exception('File uploading failed. Please try again later');
            }
        }
        return true;
    }

//    public function singleImageWithThumb($files, $filestemp, $uploaddir, $with_limit, $hight_limit, $thumb_with) {
//        $filesize = filesize($filestemp);
//        $extension = strtolower(pathinfo($files, PATHINFO_EXTENSION));
//
//        //get image Width and Height in px
//        list($width, $height, $type, $attr) = getimagesize($filestemp);
//
//        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
//            throw new Exception('Unknown file extension (Allowed file extensions: .jpg, .png, .gif).');
//        }
//        if ($filesize > 2000 * 1024) {
//            throw new Exception('You have exceeded the size limit! (file cannot exceed 2 Mb).');
//        } else if ($with_limit != 'any' && $width != $with_limit) {
//            throw new Exception('Image width should be ' . $with_limit . 'px');
//        } else if ($hight_limit != 'any' && $height != $hight_limit) {
//            throw new Exception('Image height should be ' . $hight_limit . 'px');
//        } else {
//            //generate name as random String with date tag
//            $randstring = $this->generateRandomString();
//            $uploadfile = $uploaddir . $randstring . '.' . $extension;
//            $thumbpath = $uploaddir . '/Thumbs/' . $randstring . '.' . $extension;
//
//            $this->setFilename($randstring . '.' . $extension);
//            $this->setUploaddir($uploadfile);
//
//            if ($extension == "jpg" || $extension == "jpeg") {
//                $src = imagecreatefromjpeg($filestemp);
//            } else if ($extension == "png") {
//                $src = imagecreatefrompng($filestemp);
//            } else {
//                $src = imagecreatefromgif($filestemp);
//            }
//
//            //original image size
//            $newheight = $height;
//            $newwidth = $width;
//            $tmp = imagecreatetruecolor($newwidth, $newheight);
//
//            //Thumb image size
//            $newwidth1 = $thumb_with;
//            $newheight1 = ($height / $width) * $newwidth1;
//            $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);
//
//            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//            imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
//
//            if (imagejpeg($tmp, $this->getUploaddir(), 85) && imagejpeg($tmp1, $thumbpath, 85)) {
//                //echo "File is valid, and was successfully uploaded.";
//            } else {
//                throw new Exception('File uploading failed. Please try again later');
//            }
//            imagedestroy($src);
//            imagedestroy($tmp);
//            imagedestroy($tmp1);
//        }
//        return true;
//    }

    public function singleImageResizedWithThumb($files, $filestemp, $uploaddir, $resize_width, $resize_height, $thumb_with) {
        $filesize = filesize($filestemp);
        $extension = strtolower(pathinfo($files, PATHINFO_EXTENSION));

        //get image Width and Height in px
        list($width, $height, $type, $attr) = getimagesize($filestemp);

        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
            throw new Exception('Unknown file extension (Allowed file extensions: .jpg, .png, .gif).');
        }
        if ($filesize > 2000 * 1024) {
            throw new Exception('You have exceeded the size limit! (file cannot exceed 2 Mb).');
        } else {
            //generate name as random String with date tag
            $randstring = $this->generateRandomString();
            $uploadfile = $uploaddir . $randstring . '.' . $extension;
            $thumbpath = $uploaddir . '/Thumbs/' . $randstring . '.' . $extension;

            $this->setFilename($randstring . '.' . $extension);
            $this->setUploaddir($uploadfile);

            if ($extension == "jpg" || $extension == "jpeg") {
                $src = imagecreatefromjpeg($filestemp);
            } else if ($extension == "png") {
                $src = imagecreatefrompng($filestemp);
            } else {
                $src = imagecreatefromgif($filestemp);
            }

            if ($resize_width > 0 && $width > $resize_width) {
                $newwidth = $resize_width;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);
            } else if ($resize_height > 0 && $height > $resize_height) {
                $newheight = $resize_height;
                $newwidth = ($width / $height) * $newheight;
                $tmp = imagecreatetruecolor($newwidth, $newheight);
            } else {
                $newwidth = $width;
                $newheight = $height;
                $tmp = imagecreatetruecolor($newwidth, $newheight);
            }


            //Thumb image size
            $newwidth1 = $thumb_with;
            $newheight1 = ($height / $width) * $newwidth1;
            $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
 			
			
			// creating png image of watermark
			$watermark = imagecreatefrompng('images/watermark.png');
			$watermark_thumb = imagecreatefrompng('images/thumbwatermark.png');
			 
			// getting dimensions of watermark image
			$watermark_width = imagesx($watermark); 
			$watermark_height = imagesy($watermark);
			
			// getting dimensions of watermark image
			$watermark_width_thumb = imagesx($watermark_thumb); 
			$watermark_height_thumb = imagesy($watermark_thumb); 
			 
			// placing the watermark 5px from bottom and right
			$dest_x = $newwidth - $watermark_width - 5; 
			$dest_y = $newheight - $watermark_height - 5;
			$dest_x_thumb = $newwidth1 - $watermark_width_thumb - 5; 
			$dest_y_thumb = $newheight1 - $watermark_height_thumb - 5;
			// blending the images together
			imagealphablending($tmp, true);
			imagealphablending($watermark, true);
			imagealphablending($tmp1, true);
			imagealphablending($watermark_thumb, true);
			// creating the new image
			imagecopy($tmp, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
			imagecopy($tmp1, $watermark_thumb, $dest_x_thumb, $dest_y_thumb, 0, 0, $watermark_width_thumb, $watermark_height_thumb);
			
            if (imagejpeg($tmp, $this->getUploaddir(), 50) && imagejpeg($tmp1, $thumbpath, 50)) {
                //echo "File is valid, and was successfully uploaded.";
            } else {
                throw new Exception('File uploading failed. Please try again later');
            }
            imagedestroy($src);
            imagedestroy($tmp);
            imagedestroy($tmp1);
        }
        return true;
    }

}

?>