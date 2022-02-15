<?php
require 'conf.php';

//Session from SigninProc.php || SignupPro.php
session_start();
$otp_pass = $_SESSION['otp_password'];
$emailerr = $_SESSION['emailer'];

//include mailer
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
//namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//create inst
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPAuth = "true";
//encrypt mail with tls
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Username = "katevaschris@gmail.com";
$mail->Password = "ypopteokhdleinvo";
$mail->Subject = "OTP";
$mail->setFrom("katevaschris@gmail.com");

$message_body = 'Your One time Password: '.$otp_pass.'';
$mail->Body = $message_body;
$mail->addAddress($emailerr);

if ($mail->Send())
{
	echo '<script type="text/JavaScript">alert("A verification password has been send to your email.");</script>';


echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Verify</title>
</head>
<body>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <div  class="testbox">
        <h1>Register Page</h1>
      <form id="_form" action="verify.php" method="post">

      <label id="icon" for="name"><i class="icon-shield"></i></label>
      <input type="otp"  onkeypress="return onlyNumberKey(event)" name="otp" id="_otp" placeholder="..." maxlength="6"  required/>
      <button class="button" name="btn" type="submit">Submit</button> 
   
       </form>
      
      
    </div>
    
    </body>


<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</html>

';
}
else {
	echo '<script type="text/JavaScript">alert("Your verification password is wrong reload page.");</script>';
}

$mail->smtpClose();


//______________________________________________________



?>