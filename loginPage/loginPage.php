<?php
session_start();


if(isset($_SESSION['user'])!= ""){
	header('Location: home.php');
}

include_once('init.php');

//check if submit is clicked
if(isset($_POST['btn-login'])){
	
	//eliminate and special chars or white space
	$email= $conn->real_escape_string(trim($_POST['email']));
	$pass= $conn->real_escape_string(trim($_POST['pwd']));
	
	//encrypt password
	$pw= md5($pass);
	
	//find column and row data
	$result= $conn->query("SELECT * FROM  users WHERE email = '$email' ");
	
	//The mysqli_fetch_assoc() function fetches a result row as an associative array.
	
	$rowData = $result->fetch_assoc();
	
	if($rowData['pw']== $pw)
	{
		$_SESSION['user']=$rowData['id'];
		header('Location: home.php');
		
	}
	
	
	else 
	{
		?>
		<script> alert("Wrong Details"); </script>
		
<?php
		
	}
}

?>


<!DOCTYPE html>
<html>
	<head> 
		<title> Login Page</title>
			<meta charset="utf-8"/>
			<link href="login.css" type="text/css" rel="stylesheet"/>
	</head>
<body>
          <div id="main">
	
		
			<div id="login-form">
	           
				 
		       <div class="form">
				 <form method="post">
				  <label for="email"> Email Address: </label>
				  <input type="email" name ="email" placeholder="Email addresss" required/></br>
				  <label for="password"> Password: </label>
				  <input type="password" name="pwd" placehoder="Password" required></br>
				  
				  <button type="submit" name="btn-login" > Sign In </button>
				   </form>
					
					<a  class="register" href="registrar.php"> Sign Up here</a>
					
							 
					
					</div>
					 
					</div>
					
					
					
					<div id="mask"> 
					   <img src="images/nyc.jpg" width="100%" height="100%" >
					  </div>
			</div> <!--end of main-->

</body>
</html>