<?php 
session_start();
require_once 'config.php';
require_once 'helper.php';
$action = $_REQUEST['submit'];

switch ($action) {
	case 'submit':

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $u_id = $_REQUEST['u_id'];
        $zip = $_REQUEST['zip'];
        $mobile = $_REQUEST['mobile'];
        $ordernt = $_REQUEST['ordernt'];
        $p_type = $_REQUEST['p_type'];
        $order_id = 'Ordr' . rand(1111,99999);
        $total = $_REQUEST['total'];
        $date = date("Y-m-d H:i:s");
        $sessionid=session_id();
        $ct_ids = $_REQUEST['ct_id'];

        $db->query("INSERT INTO `order_details` (`od_id`,`name` ,`email`,`address`, `city`,`state`,`u_id`,`zip`,`total`,`order_id`,`date`,`mobile`,`ordernt`,`p_type`,`psts`,`sts` ) VALUES (NULL,'$name','$email','$address' ,'$city','$state', '$u_id' , '$zip','$total','$order_id','$date','$mobile','$ordernt','$p_type','1','1')");
		$od_id = $db->insert_id;

$i = 0;
foreach ($ct_ids as $val) {
$ct_id = $_POST['ct_id'][$i];
$orderid = $order_id;
 $db->query("INSERT INTO `order_data` (`or_d`, `od_id`, `ct_id`, `u_id`, `sesion`, `date`,`orderid`) VALUES (NULL, '$od_id', '$ct_id', '$u_id', '$sessionid', '$date','$orderid')");
  $i++;
 }
$db->query("UPDATE cart SET sts = 1 WHERE u_id = '$u_id'");

if ($p_type == 1) {


        $_SESSION['errormsg'] = 'Your Order Receive Successfully';
        $_SESSION['errorValue'] = 'success';
        $_SESSION['msg'] = md5('5');
        header("location: ../my-account.php");
}else{


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");




$checkSum = "";
$paramList = array();



 $ORDER_ID = $orderid;
 $CUST_ID = $u_id;
 $INDUSTRY_TYPE_ID = 'Retail';
 $CHANNEL_ID = 'WEB';
 $TXN_AMOUNT = $total;

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = 'SsuhUC74973686801192';
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $u_id;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = 'WEBSTAGING';

    $paramList["CALLBACK_URL"] = "http://www.safiya.in/action/paymentres.php?u_id=" . $CUST_ID;
    $paramList["MSISDN"] = $mobile ;
    $paramList["EMAIL"] = $email; //Email ID of customer
    $paramList["VERIFIED_BY"] = "EMAIL"; //
    $paramList["IS_USER_VERIFIED"] = "YES"; //


//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);



   ?>

<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
    <center><h1>Please do not refresh this page...</h1></center>
        <form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
        <table border="1">
            <tbody>
            <?php
            foreach($paramList as $name => $value) {
                echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
            }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
            </tbody>
        </table>
        <script type="text/javascript">
            document.f1.submit();
        </script>
    </form>
</body>
</html>
   <?php  
}
        break ;

    default:
            $_SESSION['errormsg'] = 'Invalid page access.';
        $_SESSION['errorValue'] = 'warning';

        }


 ?>