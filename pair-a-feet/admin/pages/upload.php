<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $name = $_REQUEST['name'];
        $title = $_REQUEST['title'];
        $img1 = $_REQUEST['img1'];
 
        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `share` (`id`,`name`,`title`,`img1`,`date`) VALUES (NULL,'$name','$title','$img1','$date')");
        
        $id = $db->insert_id;

        // photoupload



// Path configuration 
$targetDir = "uploads/"; 
$watermarkImagePath = '../logo.png'; 
 
$statusMsg = ''; 

    if(!empty($_FILES["img1"]["name"])){ 
        // File upload path 
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $fileName = $rand . basename($_FILES["img1"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to the server 
            if(move_uploaded_file($_FILES["img1"]["tmp_name"], $targetFilePath)){ 
                // Load the stamp and the photo to apply the watermark to 
                $watermarkImg = imagecreatefrompng($watermarkImagePath); 
                switch($fileType){ 
                    case 'jpg': 
                        $im = imagecreatefromjpeg($targetFilePath); 
                        break; 
                    case 'jpeg': 
                        $im = imagecreatefromjpeg($targetFilePath); 
                        break; 
                    case 'png': 
                        $im = imagecreatefrompng($targetFilePath); 
                        break; 
                    default: 
                        $im = imagecreatefromjpeg($targetFilePath); 
                } 
                 
                // Set the margins for the watermark 
                $marge_right = 10; 
                $marge_bottom = 10; 
                 
                // Get the height/width of the watermark image 
                $sx = imagesx($watermarkImg); 
                $sy = imagesy($watermarkImg); 
                 
                // Copy the watermark image onto our photo using the margin offsets and  
                // the photo width to calculate the positioning of the watermark. 
                imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
                 
                // Save image and free memory 
                imagepng($im, $targetFilePath); 
                imagedestroy($im); 

                if(file_exists($targetFilePath)){ 
                    $statusMsg = "The image with watermark has been uploaded successfully."; 
                }else{ 
                    $statusMsg = "Image upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
        $db->query("UPDATE `share` SET img1 = '$targetFilePath' WHERE id = '$id'");




        $_SESSION['errormsg'] = 'Uploading successfully. Wait For Aprove';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../../funzone.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `share` WHERE id ='$id'");
        $_SESSION['errormsg'] = 'share Delete successfully.';
                $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../funzone.php?msg=" . md5('7') . "");

break;
break;
    case 'Disable':
        $id = $_REQUEST[ 'id' ];
        $db->query( "UPDATE product SET sts= '0' WHERE id = '$id'" );
        $_SESSION[ 'errormsg' ] = 'share disabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location:../funzone.php?msg=" . md5('7') . "" );
        break;
    case 'Enable':
        $id = $_REQUEST[ 'id' ];
        $db->query( "UPDATE share SET sts ='1' WHERE id = '$id'" );
        $_SESSION[ 'errormsg' ] = 'share enabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../funzone.php?msg=" . md5('7') . "" );
        break;


case 'update':
    
        $p_id = $_REQUEST['p_id'];
        $c_id = $_REQUEST['c_id'];
        $sc_id = $_REQUEST['sc_id'];
        $sprice = $_REQUEST['sprice'];
        $link = $_REQUEST['link'];
        $name = $_REQUEST['name'];

        $descr = $_REQUEST['descr'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `product` SET name = '$name' ,c_id = '$c_id',sc_id = '$sc_id',link = '$link',sprice = '$sprice', descr = '$descr' WHERE p_id = '$p_id' ");
            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `product` SET img1 = '$bannerpath' WHERE p_id = '$p_id'");



    default:


        $_SESSION['errormsg'] = 'product Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../product.php?id=");
        
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>