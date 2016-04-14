<?php
session_start();
//user not logged in return to login page
if(!isset($_SESSION['user']))
{
	header('Location: loginpage.php');
	
}
//user is logged in
else if(isset($_SESSSION['user'])!="")
{
	header('Location: home.php');
}
else if(isset($_GET['logout']))
{
	
	//destroy session and logout
	session_destroy();
	//user informatiion by id
	unset($_SESSION['user']);
	header('Location: loginPage.php');
	
}

?>