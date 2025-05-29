<?php 
session_start();
require_once 'config.php';
require_once 'helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':
        $ps_id = $_REQUEST['ps_id'];
        $data = $db->query("SELECT * FROM `price` WHERE ps_id = '$ps_id'");
        $value = $data->fetch_object();
        $size = $value->name;
        $p_id = $_REQUEST['p_id'];
        $name = $_REQUEST['name'];
        $img1 = $_REQUEST['img1'];
        $qty = $_REQUEST['qty'];
        $price = $_REQUEST['price'];
        $u_id = $_REQUEST['u_id'];
        $url = $_REQUEST['url'];

        $sessionid=session_id();
        $totls = $price * $qty;
        $date =  date('Y-m-d H:i:s');
        $data = $db->query("SELECT * FROM `cart` WHERE p_id = '$p_id' AND sesion = '$sessionid'");
        if ( $data->num_rows > 0 ) { 
        $_SESSION['errormsg1'] = 'Already Added';
        $_SESSION['errorValue1'] = 'warning';
        $_SESSION['msg1'] = md5('5');
        header("location:".$url);
              }else{
        $db->query("INSERT INTO `cart` (`ct_id`,`p_id` ,`img1`,`name`, `qty`,`price`,`u_id`,`sesion`,`total`,`date` , `size`) VALUES (NULL,'$p_id','$img1','$name' ,'$qty','$price', '$u_id' , '$sessionid','$totls','$date' , '$size')");
		$ct_id = $db->insert_id;
        $_SESSION['errormsg1'] = ' Product Added';
        $_SESSION['errorValue1'] = 'success';
        $_SESSION['msg1'] = md5('5');
        header("location:".$url);
}
        break ;
case 'deletecart':
        $ct_id = $_REQUEST['ct_id'];

        $db->query("DELETE FROM `cart` WHERE ct_id = '$ct_id' ");
        $_SESSION['msg'] = md5('5');
        header("location:../cart.php?msg=" . md5('5') . "");

    break;
case 'cartupdate':
        $ct_id = $_REQUEST['ct_id'];
        $qty = $_REQUEST['qty'];
        $sessionid=session_id();
        $db->query("UPDATE `cart` SET qty = '$qty' WHERE  ct_id = '$ct_id'");
        $_SESSION['msg'] = md5('5');
        header("location:../cart.php?msg=" . md5('5') . "");


    break;
    default:
            $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>