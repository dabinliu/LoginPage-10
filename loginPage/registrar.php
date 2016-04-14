<?php

session_start();
//user is logged in and set
if(isset($_SESSION['user'])!="")
{
	//go to home or dashboard
	header('Location: home.php');
		
}

include_once('init.php');

if(isset($_POST['btn-signup']))
{
	$user= $conn->real_escape_string(trim($_POST['uname']));
	$email= $conn->real_escape_string(trim($_POST['email']));
	$password= $conn->real_escape_string(trim($_POST['pwd']));
	
	$pw= md5($password);
	
	if($conn->query("INSERT INTO users(user_n, email, pw) VALUES ('$user', '$email', '$pw')"))
	{
		?>
		<script> alert("Sucessfully Registrared!"); </script>
		
		<?php
	}
	else{
		?>
		<script> alert("Not sucessfully registrated!"); </script>
		<?php
	}
}



 

?>
<!DOCTYPE html>
	<html>
      <head>
	  <title> Sign Up </title>
	  <link href="login.css" type="text/css" rel="stylesheet"/>
	  </head>
	  <body>
	  
	  <div id="main">
	  
	  <!--login form-->
		<div id="login-form">
		
		      <div class="form">
		
				<form method="post">
					<label for="user"> Username: <label>
					<input type="text" name="uname" placeholder="Username" required>
					<label for="email"> Email Address: </label>
					<input type="email" name="email" placeholder="Email Address" required>
					<label for="password"> Password: </label>
					<input type="password" name="pwd" placeholder="Password" required>
					
					<button type="submit" name="btn-signup"> Sign Me Up</button>
					
				</form><!--end of form-->
				
				<a class="register" href="loginpage.php"> Sign-in Here</a>
				
			 </div>
			 
		
		</div><!--end of login form-->
		
	</div><!--end of main-->
      </body>
	</html>