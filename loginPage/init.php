<?php

$host='localhost';
$user= '';
$pw='';
$db='registration';


$conn= new mysqli( $host, $user, $pw, $db);

 if($conn->connect_error){
	 die("Connection fail" . $conn->connect_error);
 }


?>