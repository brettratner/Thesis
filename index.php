<?php 
// include configuration file
include('config.php');
	
// connect to the database
$dbc = @mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
	
	// continue session
	session_start();
	
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
	<!-- 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script> -->
	 <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<link href="css/mainStyle.css" type="text/css" rel="stylesheet">

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
		<h1> <a href="index.php">Let's Go</a></h1>
		</div>
<header>
 
		 <div class="navigation">
			<ul class="links">
				
				<li><a href="Settings.php">Settings</a></li>
				<li><a href="feedback.php">Feedback</a></li>
			</ul>
		</div>
 
 <div id="toggle" onclick="toggleNav();">
		<i class="fa fa-bars fa-3x"></i>
	</div>
 </header>

 <div class= "loginSignup">
			<h4> 
				<a href="signIn.php">Sign in</a> /
			    <a href="php/signUp.php">Sign up</a>
			</h4>
		
		</div>
<div class="button1">
 <button class="btn btn-default" id="findLocation" type="button">Find Location</button>
 </div>
 <div class="button2">
 <button class="btn btn-default" id="FavoritePlaces" type="button">Favorite Places</button>
 </div>
 <div class="button3">
 <button class="btn btn-default" id="AddNewLocation" type="button"> Add New Location</button>
</div>

		
	</body>
	</html> 
