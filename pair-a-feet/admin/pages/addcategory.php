<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $c_name = $_REQUEST['c_name'];

        $c_desc = $_REQUEST['c_desc'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `category` (`c_id`, `c_name`, `img1`, `c_desc` ,`sts`, `date`) VALUES (NULL, '$c_name', '$img1' , '$c_desc','1','$date')");
        
        $c_id = $db->insert_id;

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
            $db->query("UPDATE `category` SET img1 = '$bannerpath' WHERE c_id = '$c_id'");




        $_SESSION['errormsg'] = 'Category Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../catagory.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $c_id = $_REQUEST['c_id'];  
        $db->query("DELETE FROM `category` WHERE c_id ='$c_id'");
        $_SESSION['errormsg'] = 'Category Delete successfully.';
                        $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../catagory.php?msg=" . md5('7') . "");

break;
break;
    case 'Disable':
        $c_id = $_REQUEST[ 'c_id' ];
        $db->query( "UPDATE category SET sts= '0' WHERE c_id = '$c_id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully disabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location:../catagory.php?msg=" . md5('7') . "" );
        break;
    case 'Enable':
        $c_id = $_REQUEST[ 'c_id' ];
        $db->query( "UPDATE category SET sts ='1' WHERE c_id = '$c_id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully enabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../catagory.php?msg=" . md5('7') . "" );
        break;


case 'update':
    
        $c_id = $_REQUEST['c_id'];
        $c_name = $_REQUEST['c_name'];

        $c_desc = $_REQUEST['c_desc'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `category` SET c_name = '$c_name' , c_desc = '$c_desc' WHERE c_id = '$c_id' ");
            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `category` SET img1 = '$bannerpath' WHERE c_id = '$c_id'");

        $_SESSION['errormsg'] = 'Category Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../catagory.php");



        
        break;
    default:

        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>