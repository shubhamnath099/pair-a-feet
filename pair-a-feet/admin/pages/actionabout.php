<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $id = $_REQUEST['id'];
        $about = $_REQUEST['about'];
        $mision = $_REQUEST['mision'];
        $vison = $_REQUEST['vison'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `about` (`id`, `about`,`mision` ,`vison`,`date`) VALUES (NULL, '$about', '$mision' ,'$vison', '$date')");
		
		$id = $db->insert_id;

		// photoupload





        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../about.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `about` WHERE id ='$id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
         $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('7');
        header("location:../about.php?msg=" . md5('7') . "");

break;


case 'update':
    
        $id = $_REQUEST['id'];
        $about = $_REQUEST['about'];
        $mision = $_REQUEST['mision'];
        $vison = $_REQUEST['vison'];

        $date =  date('Y-m-d H:i:s');


    $db->query("UPDATE `about` SET about = '$about' , mision = '$mision' , vison = '$vison'  WHERE id = '$id' ");


        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../about.php");


    default:


		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>