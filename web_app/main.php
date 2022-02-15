<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("signup.php"); 
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="style.css" rel="stylesheet" id="bootstrap-css">


<div id="particles">

  <div id="webcoderskull">
    <h2>Online notebook</h2>
    <button class="button" name="btn" onclick="windows.location='.php'">+add Note</button> 
    <p> 
      <br>
    @2022 Online Notebook - Privacy Policy</p>
    <br>
    <a class="btn lg" href = "logout.php"> Log out </a>
  </div>
</div>
    
    
<script src="mind.js"></script>
</body>
</html>
