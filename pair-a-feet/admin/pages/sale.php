<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $address = $_REQUEST['address'];
        $p_id = $_REQUEST['p_id'];
        $price = $_REQUEST['price'];
        $quntity = $_REQUEST['quntity'];
        $total = $_REQUEST['total'];
        $bildate = date('F j, Y');
        $bilno = 'RE' . rand(11,9999);
        $a_id = $_REQUEST['a_id'];
        $date =  date('Y-m-d H:i:s');



        $db->query("INSERT INTO `sale` (`s_id`, `name`, `email`, `mobile`,`address`,`product`,`price`,`quntity` ,`total`,`bildate`,`bilno`,`a_id`,`date`) VALUES (NULL, '$name', '$email' , '$mobile','$address' ,'$p_id', '$price','$quntity','$total','$bildate','$bilno','$a_id','$date')");
		
        $data = $db->query("SELECT * FROM `product` WHERE p_id = '$p_id'");
        $value = $data->fetch_object();
        $stock = $value->stock;
        $pname = $value->pname;
        $totalstock = $stock - $quntity;
        $db->query("UPDATE `product` SET stock = '$totalstock' WHERE p_id = '$p_id'");

		$s_id = $db->insert_id;


        $toEmail = "rahmat.ansari.sorda@gmail.com";
        $subject = 'Ek Naya Phone Sale Hua';
        $headers ="From: sambitpatra@gmail.com";
        $bodyMsg = "Coustumer Ka Name . Name - " . $name ." , Mobile number - " . $mobile . " , Sale Item is " .$pname . " , Bill No " . $bilno;

        mail($toEmail,$subject, $bodyMsg,$headers);

        $retoEmail = $email;
        $resubject = 'Thanks For Buying From Reshmi Electronics';
        $reheaders ="From: rahmat.ansari.sorda@gmail.com";
        $rebodyMsg = "Thank You " . $name ." , You Buy " .$pname . " , Bill No " . $bilno;

        mail($retoEmail,$resubject, $rebodyMsg,$reheaders);








		// photoupload

        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../viewallsale.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $s_id = $_REQUEST['s_id'];  
        $db->query("DELETE FROM `sale` WHERE s_id ='$s_id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
        $_SESSION['msg'] = md5('7');
        $_SESSION['errorValue'] = 'success';
        header("location:../viewallsale.php?msg=" . md5('5') . "");

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