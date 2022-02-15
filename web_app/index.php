<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
  <h1>Log in</h1>

  <form action="signinProc.php" method="post">
  <label id="icon" for="name"><i class="icon-envelope "></i></label>
  <input type="text" name="email" id="_mail" placeholder="Email" required/>
  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="password" id="name" placeholder="Password" required/>
  
   <button class="button" type="submit">Sign in</button>
  
  <button class="button" onclick="document.location='signup.php'">Sign up</button> 

 

</form>
</div>
</body>
</html>