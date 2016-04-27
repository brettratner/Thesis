<?php 
// include configuration file
include('../config.php');
	
// connect to the database
$dbc = @mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
	
	// continue session
	session_start();
	
	// check for a user_id
	if(!$_SESSION['user_id'])
	{
		// redirect user to homepage if they are not signed in
		header("Location: ../index.php");	
	}

$result = mysqli_query($dbc,"SELECT * FROM LetsGo");


 while($row = mysqli_fetch_array($result))
 {
 	$green = $row['Green'];
	$red = $row['Red'];
	$yellow = $row['Yellow'];

	$max = max(array($green, $red, $yellow));

	if ($max == $green) {
		$status = 'Green';
	} else if ($max == $red) {
		$status = 'Red';
	} else if ($max == $yellow) {
		$status = 'Yellow';
	}
 	
 	$html = $html.
 $html = $html. "<tr>";
  $html = $html. "<td>" . $status . "</td>";
  $html = $html. "<td><a href='details.php?id=". $row['id'] ."'>" . $row['LocationName'] . "</a></td>";

  $html = $html. "</tr>";
  
 }
$html = $html. "</table>";

mysqli_close($dbc);

   ?>

	
	






