<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];

        $para = $_REQUEST['para'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `testimonial` (`id`, `name`, `img1`, `para` ,`sts` ,`date`) VALUES (NULL, '$name', '$img1' , '$para','0','$date')");
		
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
            $db->query("UPDATE `testimonial` SET img1 = '$bannerpath' WHERE id = '$id'");





        $_SESSION['errormsg'] = 'testimonial Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../testimonials.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `testimonial` WHERE id ='$id'");
        $_SESSION['errormsg'] = 'testimonial Delete successfully.';
        $_SESSION['msg'] = md5('7');
        $_SESSION['errorValue'] = 'success';
        header("location:../testimonials.php?msg=" . md5('7') . "");

break;
    case 'Disable':
        $id = $_REQUEST[ 'id' ];
        $db->query( "UPDATE testimonial SET sts= '0' WHERE id = '$id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully disabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location:../testimonials.php?msg=" . md5('7') . "" );
        break;
    case 'Enable':
        $id = $_REQUEST[ 'id' ];
        $db->query( "UPDATE testimonial SET sts ='1' WHERE id = '$id'" );
        $_SESSION[ 'errormsg' ] = 'Sucessfully enabled the item.';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../testimonials.php?msg=" . md5('7') . "" );
        break;

case 'update':
    
        $id = $_REQUEST['id'];
        $head = $_REQUEST['head'];

        $para = $_REQUEST['para'];

        $date =  date('Y-m-d H:i:s');

 $db->query("UPDATE `testimonial` SET name = '$name' , para = '$para' WHERE id = '$id' ");


            $img1=$_FILES['img1']['name']; 
            $expbanner=explode('.',$img1);
            $bannerexptype=$expbanner[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $bannername=md5($encname).'.'.$bannerexptype;
            $bannerpath="uploads/".$bannername;
            move_uploaded_file($_FILES["img1"]["tmp_name"],$bannerpath);
            $db->query("UPDATE `testimonial` SET img1 = '$bannerpath' WHERE id = '$id'");



    default:


        $_SESSION['errormsg'] = 'Testimonial Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../testimonials.php");
		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';
header("Location: ../404.php");
        }


 ?>