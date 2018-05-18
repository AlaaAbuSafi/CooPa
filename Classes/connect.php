<?php
	$servername = "localhost";
	$dbusername = "alaa";
	$dbpassword = "12345";
	$dbname = "CooPa";

	$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

	if(!$conn){
		die("can't connect to server " . mysqli_Connect_error());
	}
?>