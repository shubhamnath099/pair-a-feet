<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $c_id = $_REQUEST['c_id'];
        $sc_name = $_REQUEST['sc_name'];

        $sc_desc = $_REQUEST['sc_desc'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `subcategory` (`sc_id`,`c_id`, `sc_name`, `img1`, `sc_desc` ,`sts`, `date`) VALUES (NULL,'$c_id', '$sc_name', '$img1' , '$sc_desc','1','$date')");
        
        $sc_id = $db->insert_id;

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
            $db->query("UPDATE `subcategory` SET img1 = '$bannerpath' WHERE sc_id = '$sc_id'");




        $_SESSION['errormsg'] = 'subcategory Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../subcategory.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $sc_id = $_REQUEST['sc_id'];  
        $db->query("DELETE FROM `subcategory` WHERE sc_id ='$sc_id'");
        $_SESSION['errormsg'] = 'subcategory Delete successfully.';
                $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../subcategory.php?msg=" . md5('7') . "");

break;
break;
    case 'Disable':
        $sc_id = $_REQUEST[ 'sc_id' ];
        $db->query( "UPDATE subcategory SET sts= '0' WHERE sc_id = '$sc_id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully disabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location:../subcategory.php?msg=" . md5('7') . "" );
        break;
    case 'Enable':
        $sc_id = $_REQUEST[ 'sc_id' ];
        $db->query( "UPDATE subcategory SET sts ='1' WHERE sc_id = '$sc_id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully enabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../subcategory.php?msg=" . md5('7') . "" );
        break;


case 'update':
    
        $c_id = $_REQUEST['c_id'];
        $sc_id = $_REQUEST['sc_id'];
        $sc_name = $_REQUEST['sc_name'];

        $sc_desc = $_REQUEST['sc_desc'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `subcategory` SET sc_name = '$sc_name' ,c_id = '$c_id', sc_desc = '$sc_desc' WHERE sc_id = '$sc_id' ");
            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `subcategory` SET img1 = '$bannerpath' WHERE sc_id = '$sc_id'");



    default:


        $_SESSION['errormsg'] = 'subcategory Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../subcategory.php?id=");
        
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>