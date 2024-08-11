<?php

	$db_hostname = 'localhost'; //or $db_hostname = '127.0.0.1';
	$db_username = 'root';
	$db_password = '';
	$db_database = 'webproject';
	
	$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>