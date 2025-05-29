<?php

session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['submit'];
if ($action == 'updatepwd') {
 // $atype = $_SESSION['a_usertype'];
  $a_idchk = $_REQUEST['a_idchk'];
  $a_pwd = md5($_REQUEST['a_pwd']);
  $confirm_a_pwd = md5($_REQUEST['confirm_a_pwd']);
  $a_vpwd = $_REQUEST['a_pwd'];
  if ($a_pwd !== $confirm_a_pwd) {
    $db->close();
   $_SESSION['errormsg'] = 'Confirm password did not match';
    $_SESSION['errorValue'] = 'warning';
    header("Location: ../dashboard?msg=" . md5('10') . "");
  } else {
    $db->query("UPDATE admin SET a_password='$a_pwd', a_vpwd='$a_vpwd'  WHERE a_id = '$a_idchk'");
    $db->close();
    $_SESSION['errormsg'] = 'Password Changed';
    $_SESSION['errorValue'] = 'success';
    header("Location: ../404?msg=" . md5('3') . "");
  }
}
