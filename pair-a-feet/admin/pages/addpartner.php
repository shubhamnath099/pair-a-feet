<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':

        $db->query("INSERT INTO `partner` (`id` ) VALUES (NULL)");
        
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
            $db->query("UPDATE `partner` SET img1 = '$bannerpath' WHERE id = '$id'");

            $_SESSION['errormsg'] = ' Added successfully.';
            $_SESSION['errorValue'] = 'success';
            $_SESSION['msg'] = md5('5');
            header("location:../partner.php?msg=" . md5('5') . "");

        break ;

    case 'delete':
        $id = $_REQUEST['id'];  
        $data1 = $db->query("SELECT img1 FROM `partner` WHERE id = '$id'"); // image  get
        $value1 = $data1->fetch_object();
        $img = $value1->img1;
        unlink($img); // Delete Imgae file

        $db->query("DELETE FROM `partner` WHERE id ='$id'");
        $_SESSION['errormsg'] = 'partner Delete successfully.';
        $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../partner.php?msg=" . md5('7') . "");

break;
break;
    case 'Disable':
        $j_id = $_REQUEST[ 'j_id' ];
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
        $img1 = $_REQUEST['img1'];

        $db->query("UPDATE `partner` SET img1 = '$img1' WHERE id = '$id' ");

        $img1=$_FILES['img1']['name']; 
        $expbanner=explode('.',$img1);
        $bannerexptype=$expbanner[1];
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="uploads/".$bannername;
        move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
        $db->query("UPDATE `partner` SET img1 = '$bannerpath' WHERE id = '$id'");


        $_SESSION['errormsg'] = 'Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../partner.php");
    break;
    default:

        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>