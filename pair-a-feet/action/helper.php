<?php
function convert_number_to_words($number) {

  $hyphen = '-';
  $conjunction = ' and ';
  $separator = ', ';
  $negative = 'negative ';
  $decimal = ' point ';
  $dictionary = array(
    0 => 'zero',
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six',
    7 => 'seven',
    8 => 'eight',
    9 => 'nine',
    10 => 'ten',
    11 => 'eleven',
    12 => 'twelve',
    13 => 'thirteen',
    14 => 'fourteen',
    15 => 'fifteen',
    16 => 'sixteen',
    17 => 'seventeen',
    18 => 'eighteen',
    19 => 'nineteen',
    20 => 'twenty',
    30 => 'thirty',
    40 => 'fourty',
    50 => 'fifty',
    60 => 'sixty',
    70 => 'seventy',
    80 => 'eighty',
    90 => 'ninety',
    100 => 'hundred',
    1000 => 'thousand',
    1000000 => 'million',
    1000000000 => 'billion',
    1000000000000 => 'trillion',
    1000000000000000 => 'quadrillion',
    1000000000000000000 => 'quintillion'
  );

  if (!is_numeric($number)) {
    return false;
  }

  if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
    // overflow
    trigger_error(
        'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
    );
    return false;
  }

  if ($number < 0) {
    return $negative . convert_number_to_words(abs($number));
  }

  $string = $fraction = null;

  if (strpos($number, '.') !== false) {
    list($number, $fraction) = explode('.', $number);
  }

  switch (true) {
    case $number < 21:
      $string = $dictionary[$number];
      break;
    case $number < 100:
      $tens = ((int) ($number / 10)) * 10;
      $units = $number % 10;
      $string = $dictionary[$tens];
      if ($units) {
        $string .= $hyphen . $dictionary[$units];
      }
      break;
    case $number < 1000:
      $hundreds = $number / 100;
      $remainder = $number % 100;
      $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
      if ($remainder) {
        $string .= $conjunction . convert_number_to_words($remainder);
      }
      break;
    default:
      $baseUnit = pow(1000, floor(log($number, 1000)));
      $numBaseUnits = (int) ($number / $baseUnit);
      $remainder = $number % $baseUnit;
      $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
      if ($remainder) {
        $string .= $remainder < 100 ? $conjunction : $separator;
        $string .= convert_number_to_words($remainder);
      }
      break;
  }

  if (null !== $fraction && is_numeric($fraction)) {
    $string .= $decimal;
    $words = array();
    foreach (str_split((string) $fraction) as $number) {
      $words[] = $dictionary[$number];
    }
    $string .= implode(' ', $words);
  }

  return $string;
}

function limit_words($string, $word_limit) {
  $words = explode(" ", $string);
  return implode(" ", array_splice($words, 0, $word_limit));
}



//Amit Encryption Starts here
// Input: A decimal number as a String.
// Output: The equivalent hexadecimal number as a String.
function dec2hex($number)
{
    $hexvalues = array('0','1','2','3','4','5','6','7',
               '8','9','a','b','c','d','e','f');
    $hexval = '';
     while($number != '0')
     {
        $hexval = $hexvalues[bcmod($number,'16')].$hexval;
        $number = bcdiv($number,'16',0);
    }
    return $hexval;
}

// Input: A hexadecimal number as a String.
// Output: The equivalent decimal number as a String.
function hex2dec($number)
{
    $decvalues = array('0' => '0', '1' => '1', '2' => '2',
               '3' => '3', '4' => '4', '5' => '5',
               '6' => '6', '7' => '7', '8' => '8',
               '9' => '9', 'a' => '10', 'b' => '11',
               'c' => '12', 'd' => '13', 'e' => '14',
               'f' => '15');
    $decval = '0';
    $number = strrev($number);
    for($i = 0; $i < strlen($number); $i++)
    {
        $decval = bcadd(bcmul(bcpow('16',$i,0),$decvalues[$number{$i}]), $decval);
    }
    return $decval;
}
function ob_html_compress($buf){
   // return str_replace(array("\n","\r","\t"),'',$buf);
   return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}


function sendMail($toName, $toEmail, $subject, $bodyMsg) {
  require_once('phpmailer/class.phpmailer.php');

  $mail = new PHPMailer();
  $mail->CharSet = "utf-8";
  $mail->IsSMTP();
  $mail->SMTPAuth = true; // true
  $mail->Username = "noreply@jobsclassified.in";
  $mail->Password = "Shivsatya@123";
  $mail->SMTPSecure = "tls"; //tls
  $mail->Host = "mail.jobsclassified.in";
  $mail->Port = "587"; //587
  $mail->Timeout = 60;
  $mail->setFrom('noreply@jobsclassified.in', 'Jobs Classified');
  $mail->AddAddress($toEmail, $toName);
  // $mail->AddAddress('amitsamantaray@gmail.com', 'Amit');

  $mail->Subject = $subject;
  $mail->IsHTML(true);
  $bodyMsgDetail = preg_replace('/ \+/', ' ', $bodyMsg);
  //convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
  $mail->msgHTML($bodyMsgDetail);
//Replace the plain text body with one created manually
  $mail->AltBody = 'This is a noreplay mail service from jobsclassified.';
//Attach an image file
//$mail->addAttachment('images/logo.png');
  //  $mail->Body    = 'Hi there ,
//                    <br />
//            this mail was sent using PHPMailer...
//            <br />
//            cheers... :)';
  $mailed = $mail->Send();
  // echo $mail->ErrorInfo;
  unset($mail);
  return $mailed;
}
