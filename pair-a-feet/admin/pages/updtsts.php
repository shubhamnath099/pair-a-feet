<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $stid = $_REQUEST['stid'];
        $a_id = $_REQUEST['a_id'];

        $s_id = $_REQUEST['s_id'];
        $sts = $_REQUEST['sts'];


        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `sts` (`stid`, `a_id`, `s_id`, `sts` , `date`) VALUES (NULL, '$a_id', '$s_id' , '$sts','$date')");
		
		$stid = $db->insert_id;

		// photoupload






        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../addstudent.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `blog` WHERE id ='$id'");
        $_SESSION['errormsg'] = 'Blog Delete successfully.';
         $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('7');
        header("location:../blog.php?msg=" . md5('7') . "");

break;


case 'update':
    
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];

        $sdesc = $_REQUEST['sdesc'];
        $fdesc = $_REQUEST['fdesc'];
        $sign = $_REQUEST['sign'];

        $date =  date('Y-m-d H:i:s');
 $db->query("UPDATE `blog` SET title = '$title' , sdesc = '$sdesc', fdesc = '$fdesc' WHERE id = '$id' ");

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
                        $g_temp = resizeImage($_FILES['img1']['tmp_name'], 1200, 400, $photo);
                        $imgfile = "uploads/" . $new_photo;
                        imagejpeg($g_temp, $imgfile);
                        $data = $db->query("SELECT * FROM blog WHERE id = '$id'");
                        $value = $data->fetch_object();
                         if (file_exists($value->img1)) {
                        unlink($value->img1); // remove files
                         }
                        $db->query("UPDATE `blog` SET img1 = '$imgfile' WHERE id = '$id'");
                    }
                }
            }
        }


    default:


        $_SESSION['errormsg'] = 'Blog Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../blog.php?id=");
		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>