<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $p_id = $_REQUEST['p_id'];
        $uid = $_REQUEST['uid'];
        $data = $db->query("SELECT * FROM `unit` WHERE uid = '$uid'");
        $value = $data->fetch_object();
        $name = $value->name;
        $price = $_REQUEST['price'];

        $db->query("INSERT INTO `price` (`ps_id`,`p_id`, `uid`, `price`,`name`) VALUES (NULL,'$p_id', '$uid' ,'$price','$name')");
        

        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../price.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $ps_id = $_REQUEST['ps_id'];  
        $db->query("DELETE FROM `price` WHERE ps_id ='$ps_id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
                $_SESSION['errorValue'] = 'danger';
        $_SESSION['msg'] = md5('7');
        header("location:../price.php?msg=" . md5('5') . "");

break;


case 'update':
    
        $ps_id = $_REQUEST['ps_id'];
        $p_id = $_REQUEST['p_id'];
        $uid = $_REQUEST['uid'];
        $price = $_REQUEST['price'];

        $db->query("UPDATE `price` SET p_id = '$p_id' , uid = '$uid' , price = '$price'   WHERE ps_id = '$ps_id' ");





        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("location:../price.php?msg=" . md5('5') . "");
        
        break;
        
    default:

        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>