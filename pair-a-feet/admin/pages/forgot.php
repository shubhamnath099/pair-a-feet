<?php

session_start();
require_once '../config/config.php';
require_once '../config/helper.php';
$action = $_REQUEST['forgt'];
switch ($action) {
    case 'forgt':
    $mobile = $_REQUEST['mobile'];

    $db->query("SELECT `password` FROM `user` WHERE `mobile` = '$mobile'");
  

    // Authorisation details.
    $username = "minakshiindia6@gmail.com";
    $hash = "cea96cf70b63917e3f44cb54ef3e264a55130988e3bc95bc47f65f3ca933546a";

    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "AZDLVR"; // This is who the message appears to be from.
    $numbers = $mobile; // A single number or a comma-seperated list of numbers
    $message = "Hello Your pin is ".$password;
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('http://api.textlocal.in/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);















        $_SESSION['msg'] = md5('5');
        $_SESSION['errormsg'] = 'Your Pin is Sent Your Mobile';
        $_SESSION['errorValue'] = 'alert-success';
        header("location:../../forgot.php?msg=" . $password );
    default:
        $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'alert-danger';
        //header("Location: ../404?msg=" . md5('11') . "");
}


?>