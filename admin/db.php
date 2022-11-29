<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogloginsignup";

// CREATE connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(!$conn){
	die("Connetion failed : " . mysqli_connect_error());
}

?>