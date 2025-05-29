<?php 
session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $od_id = $_REQUEST['od_id'];
        $sts = $_REQUEST['sts'];
        $ods_id = $_REQUEST['ods_id'];
        $ods_id = $db->insert_id;
        if ($sts == 1) {
            $db->query("UPDATE od_sts SET sts1 = '1' WHERE ods_id = '$ods_id'");
        }elseif($sts == 2){
            $db->query("UPDATE od_sts SET sts2 = '2' WHERE ods_id = '$ods_id'");

        }elseif($sts == 3){
            $db->query("UPDATE od_sts SET sts3 = '3' WHERE ods_id = '$ods_id'");

        }else{
            $db->query("UPDATE od_sts SET sts4 = '4' WHERE ods_id = '$ods_id'");

        }

        $db->query("UPDATE order_details SET sts = '$sts' WHERE od_id = '$od_id'");
        

        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../order.php?msg=" . md5('5') . "");

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
        $price = $_REQUEST['price'];
        $uid = $_REQUEST['uid'];
        $data = $db->query("SELECT * FROM `unit` WHERE uid = '$uid'");
        $value = $data->fetch_object();
        $name = $value->name;

        $db->query("UPDATE `price` SET p_id = '$p_id' , uid = '$uid' , price = '$price' ,name = '$name'   WHERE ps_id = '$ps_id' ");





        $_SESSION['errormsg'] = ' Update successfully.';
        $_SESSION['errorValue'] = 'success';
        header("location:../price.php?msg=" . md5('5') . "");
        
        break;
        
    default:

        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>