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
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];



        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `sms` (`id`, `name`, `email`, `mobile` ,`subject`, `message`, `date`) VALUES (NULL, '$name', '$email' , '$mobile','$subject', '$message','$date')");
		
		$id = $db->insert_id;


        $toEmail = "inf@test.com";
        $subject = $subject;
        $headers ="From: " . $email;
        $bodyMsg = "Some One Contact To You .Name-". $name .", Mobile number-". $mobile ." ,Subject".$subject . " , Email " . $email;

        mail($toEmail,$subject, $bodyMsg,$headers);


        $_SESSION['errormsg'] = 'Your Message Send Successfully';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../../contact.php?msg=" . md5('5') . "");

        break ;


        case'delete':   
            $delete_id=$_REQUEST['id'];   
            $db->query("DELETE FROM `sms` WHERE id='$delete_id'");
            $_SESSION['msg'] = md5('7');
            header("location:../dashboard.php?msg=" . md5('7') . "");


break;



    default:


        $_SESSION['errormsg'] = 'Category Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../../index.php?id=");
		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>