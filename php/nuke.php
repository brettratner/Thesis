<?php 
// include configuration file
include('../config.php');
	
// connect to the database
$dbc = @mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
	

	$sql = "UPDATE `LetsGo` SET `Green`=0,`Yellow`=0,`Red`=0 WHERE 1";
	$result = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_assoc($result);
	?>