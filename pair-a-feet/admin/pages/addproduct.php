<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $c_id = $_REQUEST['c_id'];
        $sc_id = $_REQUEST['sc_id'];
        $sprice = $_REQUEST['sprice'];
        $mprice = $_REQUEST['mprice'];
        $stock = $_REQUEST['stock'];
        $name = $_REQUEST['name'];

        $descr = $_REQUEST['descr'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `product` (`p_id`,`c_id`,`sc_id`, `name`, `sprice`,`mprice`,`img1`, `descr` ,`sts`,`stock` ,`date`) VALUES (NULL,'$c_id','$sc_id', '$name', '$sprice','$mprice','$img1' , '$descr','1','$stock','$date')");
        
        $p_id = $db->insert_id;

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
            $db->query("UPDATE `product` SET img1 = '$bannerpath' WHERE p_id = '$p_id'");




        $_SESSION['errormsg'] = 'product Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../product.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $p_id = $_REQUEST['p_id'];  
        $db->query("DELETE FROM `product` WHERE p_id ='$p_id'");
        $_SESSION['errormsg'] = 'product Delete successfully.';
                $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../product.php?msg=" . md5('7') . "");

break;
break;
    case 'Disable':
        $p_id = $_REQUEST[ 'p_id' ];
        $db->query( "UPDATE product SET sts= '0' WHERE p_id = '$p_id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully disabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location:../product.php?msg=" . md5('7') . "" );
        break;
    case 'Enable':
        $p_id = $_REQUEST[ 'p_id' ];
        $db->query( "UPDATE product SET sts ='1' WHERE p_id = '$p_id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully enabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../product.php?msg=" . md5('7') . "" );
        break;


case 'update':
    
        $p_id = $_REQUEST['p_id'];
        $c_id = $_REQUEST['c_id'];
        $sc_id = $_REQUEST['sc_id'];
        $sprice = $_REQUEST['sprice'];
        $mprice = $_REQUEST['mprice'];
        $link = $_REQUEST['link'];
        $name = $_REQUEST['name'];

        $descr = $_REQUEST['descr'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `product` SET name = '$name' ,c_id = '$c_id',sc_id = '$sc_id',link = '$link',sprice = '$sprice', descr = '$descr' , `mprice` = '$mprice' WHERE p_id = '$p_id' ");
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