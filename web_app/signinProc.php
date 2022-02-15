<?php
session_start();

 
require 'conf.php';

function validate_input($data)
{
	$data = trim($data); //Removes whitespace and other predefined characters from both sides of a string
	$data = stripslashes($data); //Removes backslashes (\) from the user input data
	$data = htmlspecialchars($data); //Converts special characters to HTML entities
	return $data;
}
$password = validate_input($_POST['password']);
$email = validate_input($_POST['email']);

$searchQuery = "SELECT
                id, fullname,AES_DECRYPT(email, '$encKey') ,AES_DECRYPT(password, '$encKey')
                FROM users
                WHERE email= AES_ENCRYPT('$email','$encKey') 
                AND password =AES_ENCRYPT('$password','$encKey')"
                or die($db-> $error);


  
$result = mysqli_query($db, $searchQuery);

$num = mysqli_num_rows($result);

if($num!=0)
{ 
    $data = mysqli_fetch_row($result);
    $id_ = $data[0];
    $fullname_ = $data[1];
    $email_ = $data[2];
    $password_ = $data[3];
    
    $otp_password = rand(100000,999999);
    $updateotp = $db->query("UPDATE users SET otp = '$otp_password' WHERE id = '$data[0]'") or die($db->error);

    $_SESSION['otp_password'] = $otp_password;
    $_SESSION['emailer'] = $data[2];

	if($email == $email_ && $password == $password_ )
	{
		$_SESSION['loggedin'] = true;
    		$_SESSION['logged_id'] = $id_;
        	header("Location:otp.php");
    	} 
} else
{
    $_SESSION['loggedin'] = false;
    header("Location:signup.php");

}
mysqli_close($db);
?>
