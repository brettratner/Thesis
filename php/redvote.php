<?php
// include configuration file
include('../config.php');

// connect to the database
$dbc = @mysqli_connect($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
	
// continue session
session_start();

// check for a user_id
if (!$_SESSION['user_id']) {
    // redirect user to homepage if they are not signed in
    header("Location: ../index.php");
}

$id = mysqli_real_escape_string($dbc, $_GET['id']);

$sql = "UPDATE LetsGo SET Red = Red + 1 WHERE id = '{$id}' ";
mysqli_query($dbc, $sql);

$json = array(
    "status" => "success"
);

$output = json_encode($json);
echo $output;
?>