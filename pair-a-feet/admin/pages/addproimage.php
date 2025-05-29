<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $p_id = $_REQUEST['p_id'];
        $date =  date('Y-m-d H:i:s');
        $db->query("INSERT INTO `proimage` (`pi_id`,`p_id`, `img1`, `date`) VALUES (NULL,'$p_id', '$img1' ,'$date')");
        
        $pi_id = $db->insert_id;

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
            $db->query("UPDATE `proimage` SET img1 = '$bannerpath' WHERE pi_id = '$pi_id'");




        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../productimage.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $pi_id = $_REQUEST['pi_id'];  
        $db->query("DELETE FROM `proimage` WHERE pi_id ='$pi_id'");
        $_SESSION['errormsg'] = 'subcategory Delete successfully.';
                $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../productimage.php?msg=" . md5('5') . "");

break;


case 'update':
    
        $pi_id = $_REQUEST['pi_id'];
        $p_id = $_REQUEST['p_id'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `proimage` SET p_id = '$p_id'  WHERE pi_id = '$pi_id' ");
            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `proimage` SET img1 = '$bannerpath' WHERE pi_id = '$pi_id'");




        $_SESSION['errormsg'] = 'subcategory Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("location:../productimage.php?msg=" . md5('5') . "");
        
        break;
        
    default:

        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>