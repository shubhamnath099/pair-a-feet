<?php 
session_start();
require_once 'config.php';
require_once 'helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
    case 'submit':


        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $password = $_REQUEST['password'];
        $date =  date('Y-m-d H:i:s');
        $otp = rand(1111,9999);
        $db->query("INSERT INTO `user` (`u_id`, `name`, `email`,`mobile`,`password`,`sts`,`otp`,`date`) VALUES (NULL,'$name' ,'$email','$mobile', '$password' , '1','$otp','$date')");
        
        $u_id = $db->insert_id;
            $sessionid=session_id();
            $db->query("UPDATE `cart` SET u_id = '$u_id' WHERE sesion = '$sessionid'");


        $toEmail = "";
        $subject = "A New Coustumer Create Account Eatrize";
        $headers ="From: ". $email ;
        $bodyMsg = "A New Coustumer Create Account Eatrize Name-". $name .", Mobile number-". $mobile . "Email " . $email  ;

        mail($toEmail,$subject, $bodyMsg,$headers);


        $_SESSION['u_id'] = $u_id;
        $_SESSION['mobile'] = $mobile;
        $mobiles = $_SESSION['mobile'];

        $_SESSION['errormsg'] = ' Account Create Successfully.';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location:../my-account.php");

        break ;

 
    case 'login':
        $mobile = $_REQUEST['mobile'];
        $password = $_REQUEST['password'];
        $data = $db->query("SELECT * FROM `user` WHERE mobile = '$mobile' AND password = '$password'");
        $value= $data->fetch_object();
        $sts = $value->sts;
        $u_id = $value->u_id;
        $mobiless = $value->mobile;
        $passwords = $value->password;
        if ($mobiless == $mobile AND $password == $passwords) {

        if ($sts == '0') {
        $_SESSION['u_id'] = $u_id;
        $otp = rand(1111,9999);
        $db->query( "UPDATE user SET otp = '$otp' WHERE u_id = '$u_id'" );
        $retoEmail = "info@pixelbasket.in";
        $resubject = "Eatrize Account otp";
        $reheaders ="From: ". $email ;
        $rebodyMsg = "Welcome To Eatrize . Your OTP is". $otp  ;

        mail($retoEmail,$resubject, $rebodyMsg,$reheaders);



        $_SESSION[ 'errormsg' ] = 'Verify Your Account First';
        $_SESSION[ 'errorValue' ] = 'success';
        header( "Location: ../otp.php" );     

         }elseif($sts == '1'){

        $_SESSION['u_id'] = $u_id;
            $sessionid=session_id();
            $db->query("UPDATE `cart` SET u_id = '$u_id' WHERE sesion = '$sessionid'");
  

            $_SESSION[ 'errormsg' ] = 'Account Successfully';
        $_SESSION[ 'errorValue' ] = 'success';
        header("location:../my-account.php");
         }else{
        $_SESSION[ 'errormsg' ] = 'Opps! Somthing Went wrong';
        $_SESSION[ 'errorValue' ] = 'warning';
        header( "Location: ../login-register.php" );
         }
                }else{
        $_SESSION[ 'errormsg' ] = 'Wrong mobile No Or Password';
        $_SESSION[ 'errorValue' ] = 'warning';
        header( "Location: ../login.php" );                
    }
        break;



    case 'password':
        $u_id = $_REQUEST[ 'u_id' ];
        $password = $_REQUEST[ 'password' ];
        $db->query( "UPDATE user SET password = '$password' WHERE u_id = '$u_id'" );
        $_SESSION[ 'errormsg' ] = 'Your Password Was Changed';
        $_SESSION[ 'errorValue' ] = 'success';
        header("location:../my-account.php");
        break;
  case 'logout':
  
    unset($_SESSION['u_id']);
    unset($_SESSION['mobile']);
    $_SESSION['errormsg'] = 'Thank you for log out.';
    $_SESSION['errorValue'] = 'success';
        header("location:../index.php");
    exit();
    break;

    case 'delete':
        $u_id = $_REQUEST['u_id'];  
        $db->query("DELETE FROM `user` WHERE u_id ='$u_id'");
        $_SESSION['errormsg'] = ' Delete successfully.';
         $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('7');
        header("location:../registerrequest.php?msg=" . md5('7') . "");

        
        break;




    default:
            $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>