<?php
session_start();
if (isset($_SESSION['logged_uname'])){
header('Location: index.php');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link href="style.css" rel="stylesheet">
    <script>
    	function passwordMatching()//Check fields
    	{
    		var x = document.getElementById('_pass').value;
    		var y = document.getElementById('_pass2').value;
    		var m = document.getElementById('_name').value;
			var e = document.getElementById('_mail').value;
			//js email validation regex~ acceptable type : something @ something . something
			var filter =   /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		
			if((x==y && m!=" ") && (filter.test(e)) )
			{
				document.getElementById('_form').submit();
			}else if(!filter.test(e))
			{
			alert('Please provide a valid email address!');
			}
			else if(x!=y)
			{
				alert('Those password didnt match!');
		        document.getElementById('_pass').classList.add("x");
		        document.getElementById('_pass2').addClass('x');
			}
			else
			{
        		alert('All the fields must be filled !');
        	}
    	}
	</script>
</head>


<body>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<div  class="testbox">
    <h1>Register Page</h1>
  <form id="_form" action="signupProc.php" method="post">

  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="name" id="_name" placeholder="Name" required/>

  <label id="icon" for="name"><i class="icon-envelope "></i></label>
  <input type="text" name="email" id="_mail" placeholder="Email" required/>
  
  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="password" id="_pass" placeholder="Password"  required/>

  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="password2" id="_pass2" placeholder="Password_2"  required/>
  </form>
  <button class="button" name="btn" onclick="passwordMatching()">Sign up</button> 

  
</div>

</body>
</html>
