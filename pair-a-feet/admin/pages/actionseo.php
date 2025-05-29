<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $keywords = $_REQUEST['keywords'];
        $description = $_REQUEST['description'];
        $author = $_REQUEST['author'];
        $canonical = $_REQUEST['canonical'];
        $title = $_REQUEST['title'];

        $date =  date('Y-m-d H:i:s');


        $db->query("INSERT INTO `seo` (`id`, `keywords`,`description` ,`author`,`canonical`,`title`,`date`) VALUES (NULL, '$keywords', '$description' ,'$author','$canonical', '$title','$date')");
		
		$id = $db->insert_id;

		// photoupload





        $_SESSION['errormsg'] = ' Added successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../seo.php?msg=" . md5('5') . "");

        break ;





    case 'delete':
        $id = $_REQUEST['id'];  
        $db->query("DELETE FROM `seo` WHERE id ='$id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
         $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('7');
        header("location:../seo.php?msg=" . md5('7') . "");

break;


case 'update':
    
        $id = $_REQUEST['id'];
        $keywords = $_REQUEST['keywords'];
        $description = $_REQUEST['description'];
        $author = $_REQUEST['author'];
        $canonical = $_REQUEST['canonical'];
        $title = $_REQUEST['title'];

        $date =  date('Y-m-d H:i:s');


    $db->query("UPDATE `about` SET keywords = '$keywords' , description = '$description' , author = '$author' , canonical = '$canonical' ,title = '$title'  WHERE id = '$id' ");


        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("Location: ../seo.php");


    default:


		
        break;
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>