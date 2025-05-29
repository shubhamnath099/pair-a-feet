<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';

$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];

        $text = $_REQUEST['text'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `gallery` (`id`, `title`, `img1`, `text` , `date`) VALUES (NULL, '$title', '$img1' , '$text','$date')");
		
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

            $db->query("UPDATE `gallery` SET img1 = '$bannerpath' WHERE id = '$id'");
            





        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../gallery.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `gallery` WHERE id ='$id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
        $_SESSION['msg'] = md5('7');
        header("location:../gallery.php?msg=" . md5('7') . "");

        break ;

    case 'update':

        $a_id = $_REQUEST['a_id'];
        $a_name = $_REQUEST['a_name'];
        $a_phone = $_REQUEST['a_phone'];
        $a_email = $_REQUEST['a_email'];
        $a_vpd = $_REQUEST['a_password'];
        $a_password = md5($_REQUEST['a_password']);

        $text = $_REQUEST['text'];

        $date =  date('Y-m-d H:i:s');

        $db->query("UPDATE `admin` SET a_name = '$a_name' , a_phone = '$a_phone' , a_email = '$a_email' , a_password = '$a_password' , a_vpwd = '$a_vpd' WHERE a_id = '$a_id' ");
        
             $img1=$_FILES['img1']['name']; 
             $expbanner=explode('.',$img1);
             $bannerexptype=$expbanner[1];
             
             $date = date('m/d/Yh:i:sa', time());
             $rand=rand(10000,99999);
             $encname=$date.$rand;
             $bannername=md5($encname).'.'.$bannerexptype;
             $bannerpath="uploads/".$bannername;
             move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);

            $db->query("UPDATE `admin` SET img1 = '$bannerpath' WHERE a_id = '$a_id'");
            


    default:


        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../profile.php");
		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>