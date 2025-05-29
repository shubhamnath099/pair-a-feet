<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $id = $_REQUEST['id'];
        $head = $_REQUEST['head'];

        $para = $_REQUEST['para'];
    

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `banner` (`id`, `head`, `img1`, `para` , `date`) VALUES (NULL, '$head', '$img1' , '$para','$date')");
		
		$id = $db->insert_id;

		// photoupload

            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `banner` SET img1 = '$bannerpath' WHERE id = '$id'");


        $_SESSION['errormsg'] = 'Banner Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../slider.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `banner` WHERE id ='$id'");
        $_SESSION['errormsg'] = 'Banner Delete successfully.';
        $_SESSION['msg'] = md5('7');
        $_SESSION['errorValue'] = 'success';
        header("location:../slider.php?msg=" . md5('7') . "");

break;


case 'update':
    
        $id = $_REQUEST['id'];
        $head = $_REQUEST['head'];

        $para = $_REQUEST['para'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `banner` SET head = '$head' , para = '$para' WHERE id = '$id' ");


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
                        $g_temp = resizeImage($_FILES['img1']['tmp_name'], 1920, 720, $photo);
                        $imgfile = "uploads/" . $new_photo;
                        imagejpeg($g_temp, $imgfile);
                        $data = $db->query("SELECT * FROM banner WHERE id = '$id'");
                        $value = $data->fetch_object();
                         if (file_exists($value->img1)) {
                        unlink($value->img1); // remove files
                         }
                        $db->query("UPDATE `banner` SET img1 = '$imgfile' WHERE id = '$id'");
                    }
                }
            }
        }



    default:


        $_SESSION['errormsg'] = 'Banner Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../slider.php");
		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>