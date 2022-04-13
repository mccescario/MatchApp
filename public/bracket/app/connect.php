<?php
	$db_host = "127.0.0.1";
	$db_user = "matchappadmin";
	$db_pass = "secret";
	$db_name = "matchappdb";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
?>