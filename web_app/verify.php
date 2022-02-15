<?php 

session_start();

require 'conf.php';
$user_input = $_POST['otp'];

$user_mail = $_SESSION['emailer'];


$searchQuery = "SELECT id, fullname, AES_DECRYPT(email, '$encKey'),AES_DECRYPT(password, '$encKey'), otp, verified 
                FROM users
                WHERE email = AES_ENCRYPT('$user_mail','$encKey')" 
                or die($db-> $error);


$result = mysqli_query($db, $searchQuery);

$num = mysqli_num_rows($result);
if($num!=0)
{ 
//	echo $num;

    $data = mysqli_fetch_row($result);
    $otpmail_ = $data[2];
    $otpp_ = $data[4];



    if(($user_input == $data[4])  && ($user_mail == $data[2]))
    {
    	        echo $user_mail;

        $_SESSION['loggedin'] = true;
            $_SESSION['logged_id'] = $data[0];
            header("Location:main.php");
    } 
} else
{
        $_SESSION['loggedin'] = false;
        echo '<script type="text/JavaScript">alert("Try again.");</script>';

}
mysqli_close($db);


?>