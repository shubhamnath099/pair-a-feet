<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $s_id = $_REQUEST['s_id'];
        $title = $_REQUEST['title'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `service` (`s_id`, `title`,`img1` ,`date`) VALUES (NULL, '$title', '$img1' , '$date')");
		
		$s_id = $db->insert_id;

		// photoupload

        if (!empty($_FILES['img1']['name'])) {
            include_once '../photocrop.php';
            if ($_FILES["img1"]["size"] > 0) {
                $photo = $_FILES['img1']['name'];
                $random_digit = rand(0000, 9999) . time();
                $new_col_photo = $random_digit . $photo;
                $allowedExts = array("jpeg", "jpg", "JPEG", "JPG", "png", "PNG");
                $temp = explode(".", $_FILES["img1"]["name"]);
                $extension = end($temp);
                if (( ( $_FILES["img1"]["type"] == "image/jpeg" ) || ( $_FILES["img1"]["img1"] == "image/jpg" ) || ( $_FILES["img1"]["type"] == "image/JPEG" ) || ( $_FILES["img1"]["type"] == "image/JPG" ) || ( $_FILES["img1"]["type"] == "image/pjpeg" ) || ( $_FILES["img1"]["type"] == "image/x-png" ) || ( $_FILES["img1"]["type"] == "image/png" ) || ( $_FILES["img1"]["type"] == "image/PNG" ) ) && in_array($extension, $allowedExts)) {
                    if ($_FILES["img1"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["img1"]["error"] . "<br>";
                    } else {
                        $p_temp = resizeImage($_FILES['img1']['tmp_name'], 1000, 1000, $photo);
                       $new_photo = str_replace(" ", "_", $new_col_photo); 
                        $imgfile = "uploads/" . $new_photo; 
                        imagejpeg($p_temp, $imgfile);
                        //  $new_photo = str_replace(" ", "_", $new_col_photo);
                        $db->query("UPDATE `service` SET img1 = '$imgfile' WHERE s_id = '$s_id'");
                    }
                }
            }
        };





        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../addservice.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $s_id = $_REQUEST['s_id'];  
        $db->query("DELETE FROM `service` WHERE s_id ='$s_id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
         $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('7');
        header("location:../addservice.php?msg=" . md5('7') . "");

break;


case 'update':
    
        $s_id = $_REQUEST['s_id'];
        $title = $_REQUEST['title'];



        $date =  date('Y-m-d H:i:s');
 $db->query("UPDATE `service` SET title = '$title'  WHERE s_id = '$s_id' ");

 if (!empty($_FILES['img1']['name'])) {
            if ($_FILES["img1"]["size"] > 0) {
                $photo = $_FILES['img1']['name'];
                include_once '../photocrop.php';
                $random_digit = rand(0000, 9999) . time();
                $new_col_photo = $random_digit . $photo;
                $allowedExts = array("jpeg", "jpg", "JPEG", "JPG", "png", "PNG");
                $temp = explode(".", $_FILES["img1"]["name"]);
                $extension = end($temp);
                if (( ( $_FILES["img1"]["type"] == "image/jpeg" ) || ( $_FILES["img1"]["type"] == "image/jpg" ) || ( $_FILES["img1"]["type"] == "image/JPEG" ) || ( $_FILES["img1"]["type"] == "image/JPG" ) || ( $_FILES["img1"]["type"] == "image/pjpeg" ) || ( $_FILES["img1"]["type"] == "image/x-png" ) || ( $_FILES["img1"]["type"] == "image/png" ) || ( $_FILES["img1"]["type"] == "image/PNG" ) ) && in_array($extension, $allowedExts)) {
                    if ($_FILES["img1"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["img1"]["error"] . "<br>";
                    } else {
                        $new_photo = str_replace(" ", "_", $new_col_photo);
                        $g_temp = resizeImage($_FILES['img1']['tmp_name'], 1000, 1000, $photo);
                        $imgfile = "uploads/" . $new_photo;
                        imagejpeg($g_temp, $imgfile);
                        $data = $db->query("SELECT * FROM service WHERE s_id = '$s_id'");
                        $value = $data->fetch_object();
                         if (file_exists($value->img1)) {
                        unlink($value->img1); // remove files
                         }
                        $db->query("UPDATE `service` SET img1 = '$imgfile' WHERE s_id = '$s_id'");
                    }
                }
            }
        }


    default:


        $_SESSION['errormsg'] = 'Blog Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../addservice.php?id=");
		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>