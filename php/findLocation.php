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


   ?>
<!DOCTYPE html>
	<html>
    	<head>
    	
        	<title>Let's Go</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.2.min.js"
			  	integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
			  	crossorigin="anonymous"></script>
<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/../Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../Bootstrap/css/font-awesome.min.css">
<link href="../css/mainStyle.css" type="text/css" rel="stylesheet">

<script>
		function toggleNav(){
				if (document.getElementsByTagName("header")[0].className == "toggleNav") {
					document.getElementsByTagName("header")[0].className = "";
					document.getElementById("toggle").innerHTML = '<i class="fa fa-bars fa-3x"></i>';
				} else {
					document.getElementsByTagName("header")[0].className = "toggleNav";
					document.getElementById("toggle").innerHTML = '<i class="fa fa-times fa-3x"></i>';
				}
		}
	</script>
    	</head>
	<body>

		<div id="letsgo">
		<h1> <a href="letsgo.php">Let's Go</a></h1>
		</div>
<header>
 
		 <div class="navigation">
			<ul class="links">
				
				<li><a href="../Settings.php">Settings</a></li>
				<li><a href="../feedback.php">Feedback</a></li>
				<li><a class="navbar-brand" href="signout.php">Sign out</a></li>

			</ul>
		</div>
 
 <div id="toggle" onclick="toggleNav();">
		<i class="fa fa-bars fa-3x"></i>
	</div>
 </header>


<div class="table-responsive">
  <table class="table" style="height:100%">
<?php

$result = mysqli_query($dbc,"SELECT * FROM LetsGo");

echo "<table border='1' , width='100%' , height='100%'>
<tr>
<th>FirstName</th>
<th>LastName</th>
</tr>";

 while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
  echo "<td>" . $row['Green'] . "</td>";
  echo "<td>" . $row['LocationName'] . "</td>";

  echo "</tr>";
 }
echo "</table>";

mysqli_close($dbc);
?> 

     </table> 
  
</div>
 <div class="button3">
 <button class="btn btn-default" id="AddNewLocation" type="button"> Add New Location</button>
</div>

		
	</body>
	</html> 

