<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $sign = $_REQUEST['sign'];
        $title = $_REQUEST['title'];

        $sdesc = $_REQUEST['sdesc'];
        $fdesc = $_REQUEST['fdesc'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `blog` (`id`,`sign`, `title`, `sdesc`, `fdesc` ,`sts`, `date`) VALUES (NULL,'$sign', '$title', '$sdesc' , '$fdesc','1','$date')");
        
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
            $db->query("UPDATE `blog` SET img1 = '$bannerpath' WHERE id = '$id'");




        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../blog.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $data1 = $db->query("SELECT img1 FROM `blog` WHERE id = '$id'"); // image  get
        $value1 = $data1->fetch_object();
        $img = $value1->img1;
        unlink($img); // Delete Imgae file

        $db->query("DELETE FROM `blog` WHERE id ='$id'");
        $_SESSION['errormsg'] = 'Service Description Delete successfully.';
        $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../blog.php?msg=" . md5('7') . "");

break;
break;
    case 'Disable':
        $id = $_REQUEST[ 'id' ];
        $db->query( "UPDATE blog SET sts= '0' WHERE id = '$id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully disabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location:../blog.php?msg=" . md5('7') . "" );
        break;
    case 'Enable':
        $id = $_REQUEST[ 'id' ];
        $db->query( "UPDATE blog SET sts ='1' WHERE id = '$id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully enabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../blog.php?msg=" . md5('7') . "" );
        break;


case 'update':
    
        $id = $_REQUEST['id'];
        $sign = $_REQUEST['sign'];
        $title = $_REQUEST['title'];

        $sdesc = $_REQUEST['sdesc'];
        $fdesc = $_REQUEST['fdesc'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `blog` SET sign = '$sign' ,title = '$title', sdesc = '$sdesc' , fdesc = '$fdesc' WHERE id = '$id' ");

            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `blog` SET img1 = '$bannerpath' WHERE id = '$id'");


        $_SESSION['errormsg'] = 'Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../blog.php");

    default:

        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>