<?php

//error_reporting(0);
require 'conf.php';
session_start();

function validate_input($data)
{
	$data = trim($data); //Removes whitespace and other predefined characters from both sides of a string
	$data = stripslashes($data); //Removes backslashes (\) from the user input data
	$data = htmlspecialchars($data); //Converts special characters to HTML entities
	return $data;
}

$name = validate_input($_POST['name']);
$password = validate_input($_POST['password']);
$email = validate_input($_POST['email']);

//Before the new user registration we check if the given email already exists in database
$searchQuery = $db->query("SELECT * FROM users WHERE AES_DECRYPT(email,'$encKey') = '$email'") or die($db->error); //Κατά την ολοκλήρωση να διαγραφεί το die ή το error_reporting

if ($searchQuery->num_rows) 
{
    echo '<script language="javascript">alert("This email already exists!");</script>';
    header("Location:index.php");
} else 
{

	//Create random 6digit number for otp 
	$otp_password = rand(100000,999999);
	//use Session for otp.php to send the verificatino email
	$_SESSION['otp_password'] = $otp_password;
	$_SESSION['emailer'] = $email;

    $insertQuery = $db->query("INSERT INTO users (fullname, email, password,otp,verified)
			                    VALUES ('$name', AES_ENCRYPT('$email','$encKey'), AES_ENCRYPT('$password','$encKey'), '$otp_password','0')") or die($db->error); // Delete die function on completion, verified = 0 up until the first
    echo '<script language="javascript">alert("User created!");</script>';
    header("Location:otp.php");
}

mysqli_close($db);
