<?php
session_start();

include_once('init.php');

if(!isset($_SESSION['user'])){
	header('Location:loginPage.php');
}

$result = $conn->query("SELECT * FROM users WHERE  id=". $_SESSION['user']);
$rowData= $result->fetch_assoc();


?>
<!DOCTYPE html>
<html>
	<head> 
	<title> Welcome <?php echo $rowData['email'] ?> </title>
	<link href="login.css" type="text/css" rel="stylesheet"/>
	<meta charset="utf-8"/>
	</head>
		<body>
		<div class="main">
		<h1 class="dash">  Welcom to your Dashboard </h1>
		<div class="content">
		  <p> Hi <?php echo $rowData['user_n']?>  <a class="signout" href="logout.php?logout"> Sign Out</a></p>

			</div>
		</div><!--end of main-->
</body>
</html>