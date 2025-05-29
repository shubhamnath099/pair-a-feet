<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $adrs = $_REQUEST['adrs'];


        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `cnct` (`id`, `mobile`,`email` ,`adrs`,`date`) VALUES (NULL, '$mobile', '$email' ,'$adrs','$date')");
		
		$id = $db->insert_id;

		// photoupload





        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../information.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `cnct` WHERE id ='$id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
         $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('7');
        header("location:../information.php?msg=" . md5('7') . "");

break;


case 'update':
    
        $id = $_REQUEST['id'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $adrs = $_REQUEST['adrs'];

        $date =  date('Y-m-d H:i:s');


    $db->query("UPDATE `cnct` SET mobile = '$mobile' , email = '$email' , adrs = '$adrs'   WHERE id = '$id' ");


        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("location:../information.php?msg=" . md5('7') . "");



    default:


		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>