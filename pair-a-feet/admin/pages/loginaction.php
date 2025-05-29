<?php

session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];
switch ($action) {
  case 'Login':
    $a_phone = $_POST['a_phone'];
    $a_password = md5($_POST['a_password']);
    //get total number of records
    $results = $db->query("SELECT * FROM `admin` WHERE a_phone='$a_phone' AND a_password='$a_password' AND a_status = '1'");
    if ($results->num_rows > 0) {
      //MySqli Select Query
      $value = $db->query("SELECT a_id, a_phone, a_usertype, a_pagepermission FROM `admin` WHERE a_phone='$a_phone'");
      $row = $value->fetch_object();
      session_regenerate_id();
      $sid = session_id();
      $_SESSION[SESSVAR] = $sid;
      $_SESSION['logintype'] = 'Admin'; // set user type		
      $_SESSION['a_id'] = $row->a_id;
      $_SESSION['a_phone'] = $row->a_phone;
      $_SESSION['a_usertype'] = $row->a_usertype;
      $_SESSION['a_pagepermission'] = $row->a_pagepermission;
      $db->close();
      header("Location:../dashboard?msg=" . md5('9') . "");
    } else {
      $_SESSION['errormsg'] = 'Email or password does not match.';
      $_SESSION['errorValue'] = 'warning';
      header("Location:../index?msg=" . md5('2') . "");
    }
    break;
  case 'logout':
    unset($_SESSION[SESSVAR]);
    unset($_SESSION['logintype']); // set user type		
    unset($_SESSION['a_id']);
    unset($_SESSION['a_email']);
    unset($_SESSION['a_usertype']);
    unset($_SESSION['a_pagepermission']);
    $_SESSION['msg'] = md5('1');
    $_SESSION['errormsg'] = 'Thank you for log out.';
    $_SESSION['errorValue'] = 'success';
    header("Location:../index?msg=" . md5('logout') . "");
    exit();
    break;
  default:
    $_SESSION['errormsg'] = 'Invalid page access.';
    $_SESSION['errorValue'] = 'danger';
    header("Location: ../404?msg=" . md5('11') . "");
}