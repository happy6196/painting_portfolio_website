<?php
class base 
{
    var $tablename;
    var $query;
    var $errmsg='';
    var $bt_home   =   "bt_home"; 
    var $bt_services    =   "bt_services";
    var $bt_products    =   "bt_products";
    var $bt_about =  "bt_about";
    var $bt_contact =  "bt_contact";	
    var $bt_team =   "bt_team";
    var $bt_testi="bt_testi";  
    var $bt_advantages="bt_advantages";
    
    var $bt_clients = "bt_clients";
    
    var $bt_jobs="bt_jobs";
    
   var $bt_applicants="bt_applicants";
    
    var $bt_pages_general = "bt_pages_general";
    
    var $bt_web_settings = "bt_web_settings";
    
    var $bt_portcat = "bt_portcat";
    var $bt_portfolio = "bt_portfolio";

    
   
	
	function imageresize($photo)
{
	$photoname = substr($photo, strrpos($photo, '/') + 1);
	$image_info = getimagesize($photo);
	$width = $new_width = $image_info[0];
	$height = $new_height = $image_info[1];
	$type = $image_info[2];

// Load the image
switch ($type)
{
    case IMAGETYPE_JPEG:
        $image = imagecreatefromjpeg($photo);
        break;
    case IMAGETYPE_GIF:
        $image = imagecreatefromgif($photo);
        break;
    case IMAGETYPE_PNG:
        $image = imagecreatefrompng($photo);
        break;
    default:
        //die('Error loading '.$photo.' - File type '.$type.' not supported');
}

// Create a new, resized image
$new_width = $width;
$new_height = $height / ($width / $new_width);
$new_thumbwidth = 200;
$new_thumbheight = $height / ($width / $new_thumbwidth);
$new_image = imagecreatetruecolor($new_width, $new_height);
$new_thumbimage = imagecreatetruecolor($new_thumbwidth, $new_thumbheight);
imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagecopyresampled($new_thumbimage, $image, 0, 0, 0, 0, $new_thumbwidth, $new_thumbheight, $width, $height);

// Save the new image over the top of the original photo
 switch ($type)
{
    case IMAGETYPE_JPEG:
        if(imagejpeg($new_image,  "../images/portfolio/".$photoname) && imagejpeg($new_thumbimage,  "../images/portfolio/thumb/".$photoname) ){
			unlink($photo);
		};
		
        break;
    case IMAGETYPE_GIF:
        if(imagegif($new_image,  "../images/portfolio/".$photoname) && imagegif($new_thumbimage,  "../images/portfolio/thumb/".$photoname))
		{
			unlink($photo);
		};         
        break;
    case IMAGETYPE_PNG:
        if(imagepng($new_image,  "../images/portfolio/".$photoname) && imagepng($new_thumbimage,  "../images/portfolio/thumb/".$photoname));
		{
			unlink($photo);
		}; 
        break;
    default:
        //die('Error saving image: images/'.$name);
}

}
    function is_valid_url($url)
    {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }
	
    // this function is used to send an email through supplyed arguments
    function create_thumb_banner($inputName, $uploadDir)
    {

        $image     = $_FILES[$inputName];
        $imagePath = '';
        $thumbnailPath = '';
       
        // if a file is given
        if (trim($image['tmp_name']) != '') {
            
            $ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

            // generate a random new file name to avoid name conflict
            $imagePath = substr(md5(rand()* time()),0,10) . ".$ext";

            list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

            // make sure the image width does not exceed the maximum allowed width if yes then resize image
            if ( LIMIT_WIDTH && $width > MAX_IMAGE_WIDTH_BANNER ) {
                
                $result    = $this->createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_IMAGE_WIDTH_BANNER);
                $imagePath = $result;
            } else {
                
                $result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
            }	

            if ($result) {
                
                // create thumbnail     
                $thumbnailPath = $imagePath;

                $result = $this->createThumbnail($uploadDir . $imagePath, $uploadDir.'thumb/' . $thumbnailPath, THUMBNAIL_WIDTH);

                // create thumbnail failed, delete the image
                if (!$result) {
                    
                    unlink($uploadDir . $imagePath);
                    $imagePath = $thumbnailPath = '';
                } else {
                    
                    $thumbnailPath = $result;
                }                
                
            } else {
                    // the product cannot be upload / resized
                    $imagePath = $thumbnailPath = '';
            }
        }
        return $imagePath;
    }
   
/*
    Copy an image to a destination file. The destination
    image size will be $w x $h pixels
*/
function copyImage($srcFile, $destFile, $w, $h, $quality = 75)
    {
        $tmpSrc     = pathinfo(strtolower($srcFile));
        $tmpDest    = pathinfo(strtolower($destFile));
        $size       = getimagesize($srcFile);

        if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg")
        {
           $destFile  = substr_replace($destFile, 'jpg', -3);
           $dest      = imagecreatetruecolor($w, $h);
           imageantialias($dest, TRUE);
        } elseif ($tmpDest['extension'] == "png") {
           $dest = imagecreatetruecolor($w, $h);
           imagecolortransparent($dest, imagecolorallocatealpha($dest, 0, 0, 0, 127));
           imagealphablending($dest, false);
           imagesavealpha($dest, true);
           imageantialias($dest, TRUE);
        } else {
          return false;
        }

        switch($size[2])
        {
           case 1:       //GIF
               $src = imagecreatefromgif($srcFile);
               break;
           case 2:       //JPEG
               $src = imagecreatefromjpeg($srcFile);
               break;
           case 3:       //PNG
               $src = imagecreatefrompng($srcFile);
               break;
           default:
               return false;
               break;
        }

        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

        switch($size[2])
        {
           case 1:
           case 2:
               imagejpeg($dest,$destFile, $quality);
               break;
           case 3:
               imagepng($dest,$destFile);
        }
        return $destFile;
    }
	
    // create thumbnail of given size 

    function createThumbnail($srcFile, $destFile, $width,$height, $quality = 75)
    {
        $thumbnail = '';

        if (file_exists($srcFile) && isset($destFile))
        {
            $size        = getimagesize($srcFile);
            $w           = number_format($width, 0, ',', '');
            $h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');

            $thumbnail =  $this->copyImage($srcFile, $destFile, $width, $height, $quality);
        }

        // return the thumbnail file name on sucess or blank on fail
        return basename($thumbnail);
    }

	
    function moveImage($inputName, $uploadDir,$cust_width, $cust_height, $file_name)
    {

        $image     = $inputName;
        $imagePath = '';
        $thumbnailPath = '';
       
        // if a file is given
        if (trim($image['tmp_name']) != '') {
            
            $ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

            // generate a random new file name to avoid name conflict
            $imagePath = $file_name.".$ext";

            list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

            // make sure the image width does not exceed the maximum allowed width if yes then resize image
           
                
                $result    = $this->createThumbnail($image['tmp_name'], $uploadDir . $imagePath, $cust_width,$cust_height);
                $imagePath = $result;
          
                
              //  $result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
           
            if ($result) {
                
                // create thumbnail     
                $thumbnailPath = $imagePath;

                $result = $this->createThumbnail($uploadDir . $imagePath, $uploadDir.'thumb/' . $thumbnailPath, THUMBNAIL_WIDTH);

                // create thumbnail failed, delete the image
                if (!$result) {
                    
                    unlink($uploadDir . $imagePath);
                    $imagePath = $thumbnailPath = '';
                } else {
                    
                    $thumbnailPath = $result;
                }                
                
            } else {
                    // the product cannot be upload / resized
                    $imagePath = $thumbnailPath = '';
            }
        }
        return $imagePath;
    }
     // function to resize and image file
	 
	 // function to create seo friendly url
	 function seo_friendly_url($string)
	 {
			$string = str_replace('&', 'and', $string);    
			$string = str_replace(array('[\', \']'), '', $string);
			$string = preg_replace('/\[.*\]/U', '', $string);
			$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
			$string = htmlentities($string, ENT_COMPAT, 'utf-8');
			$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
			$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
			return strtolower(trim($string, '-'));
     }
    
     // image upload system for custom width and height 
     function upload_image($inputName, $uploadDir, $width1, $height1)
        {         
        //echo 'Width='.$width1;
        $image = $_FILES[$inputName];                
        $imagePath = '';
        $thumbnailPath = '';        
               
            // if a file is given
            if (trim($image['tmp_name']) != '') 
            {
            $ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];
            //echo "image new "; die();
            $imagePath = md5(rand() * time()) . ".$ext";
             list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

            // make sure the image width does not exceed the maximum allowed width if yes then resize image
            // echo"with1". $width1;
             if ( LIMIT_WIDTH && $width > $width1 && LIMIT_WIDTH && $height> $height1 )
             {

                $result    = $this->createThumbnail($image['tmp_name'], $uploadDir . $imagePath, $width1, $height1 );

                $imagePath = $result; 
             }
             else 
             {
          
                 $result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
             }	
                
             if ($result) 
             {
                // create thumbnail
                $thumbnailPath =  md5(rand() * time()) . ".$ext";
                $thumbnailPath = $imagePath;
                
                $result = $this->createThumbnail($uploadDir . $imagePath, $uploadDir.'thumb/' . $thumbnailPath, THUMBNAIL_WIDTH,THUMBNAIL_HEIGHT);
               
               if (!$result) 
               {
                   unlink($uploadDir . $imagePath);
                 
                   $imagePath = $thumbnailPath = '';
               }
               else
               {
                    $thumbnailPath = $result;

               }	

           }
           else 
           {
      
                $imagePath = $thumbnailPath = '';
           }
       }
        
       return $imagePath;
    }
    
}


