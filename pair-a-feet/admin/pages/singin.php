<?php

session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
if (!empty($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    //echo "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'"; die();
    $result = $db->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
    $count = $result->num_rows;
    if ($count > 0) {
        $row = $result->fetch_object();
        $_SESSION['email'] = $row->email; 
        $_SESSION['id'] = $row->id;
        $_SESSION["Vidyarthi"] = session_id();
        $_SESSION['logintype'] = 'User'; // set user type
        $id = $_SESSION['id'];
        $session = $_SESSION['sessionid'];
        if (!empty($_SESSION['id'])) {
        $resultone = $db->query("UPDATE tbl_addtocart SET  user_id = '$id' WHERE session_data = '$session'");
            if(!empty($_SESSION['totalprice'])){
                //echo "prev";
                 //header("location:../commonapplications.php");
                 header('location: ../../commonapplications.php');
              
            }else{
                 $_SESSION['errormsg'] = 'Registration successfully.';
                    $_SESSION['errorValue'] = 'success';
                header('location: ../../congratulaion.php');
            }
             //echo "afft"; die();
           // }
        //     $col_id = $_SESSION['id'];
        //     $st_id = $row->id;
        //     $resultlog = $db->query("SELECT * FROM `college` WHERE `cl_stid` = '$st_id' AND `cl_colid` = '$col_id'");
        //     //echo "SELECT * FROM `colglist` WHERE `cl_stid` = '$st_id' AND `cl_colid` = '$col_id'";
        //     if ($resultlog->num_rows > 0) {
        //         unset($_SESSION['col_id']);
        //         $_SESSION['errormsg'] = 'Already Added';
        //         $_SESSION['errorValue'] = 'warning';
        //         header("location:../topmba.php");
        //     } else {
        //         //echo 'ok';
        //         $col_cdate = date("Y-m-d H:i:s");
        //         $db->query("INSERT INTO `college` (`cl_id`, `cl_colid`, `cl_stid`, `cl_status`, `col_cdate`) VALUES (NULL, '$col_id', '$st_id', '1', '$col_cdate')");
        //         //echo "INSERT INTO `colglist` (`cl_id`, `cl_colid`, `cl_stid`, `cl_status`, `col_cdate`) VALUES (NULL, '$col_id', '$st_id', '1', '$col_cdate')";
        //         unset($_SESSION['col_id']);
        //         $_SESSION['errormsg'] = 'College added';
        //         $_SESSION['errorValue'] = 'success';
        //         // header("location:../index");
        //     }
        // }

        // $db->close();
        // header('location:../student-college');
        // exit();
        }
    } else {
        $db->close();
        $_SESSION['e_msg'] = md5('not_match');
         header('location:../../logsi.php?msg=' . md5('not_match') . '');
        exit();
    }
}