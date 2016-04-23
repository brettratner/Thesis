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


// if the form has been submitted
if(isset($_POST['submit']))
{
	// create an empty error array
	$error = array();

	

	// check for a LocationName
	if(empty($_POST['LocationName']))
	{
		$error['LocationName'] = 'Required field';
	} 
	
	// check for a XLocation
	if(empty($_POST['XLocation']))
	{
		$error['XLocation'] = 'Required field';
	} 

	// check for a YLocation
	if(empty($_POST['YLocation']))
	{
		$error['YLocation'] = 'Required field';
	} 
	

	
	// check for a PictureFile
	if(empty($_POST['PictureFile']))
	{
		$error['PictureFile'] = 'Required field';
	} 
	
	// if there are no errors
	if(sizeof($error) == 0)
	{
		// insert user into the users table
		$query = "INSERT INTO LetsGo (
					id, 
					LocationName, 
					XLocation, 
					YLocation,
					PictureFile,
					timeEntered
				) VALUES (
					null,
					'{$_POST['LocationName']}',
					'{$_POST['XLocation']}',
					'{$_POST['YLocation']}',
					'{$_POST['PictureFile']}',
					NOW()
					)";
		$result = mysqli_query($dbc, $query);
		
		// obtain user_id from table
		$id = mysqli_insert_id($dbc);
		
		
		// redirect user to profile page
		header("Location: findLocation.php");
		exit();
				
	} 
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
		
		<script type="text/javascript">
		     
			$(document).ready(function(e)
			{
				
			$.backstretch("MainPageBackgroung.png");

			});
			
		
		</script>	
		
	</head>
	<body>
		
		<!-- top navigation -->
		<!-- <?php include('topnavigation.php'); ?> -->
		<div id="letsgo">
		<h1> <a href="../index.php">Let's Go</a></h1>
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
		
		<!-- content -->	
		<div class="container" style="margin-top: 65px">
		
			<h2>Sign up</h2>

			<!-- signup form -->
			<form method="post" action="AddNewLocation.php">
				
		

				<!-- location name -->
				<div class="form-group">
					<label>Location Name</label>
					<input name="LocationName" type="text" value="<?php echo $_POST['LocationName']; ?>" autocomplete="off" class="form-control" />
					<span class="text-error"><?php echo $error['LocationName']; ?></span>
				</div>
							
				<!-- XPosition of location -->
				<div class="form-group">
					<label>X Coordinate</label>
					<input name="XLocation" type="text" value="<?php echo $_POST['XLocation']; ?>" autocomplete="off" class="form-control" />
					<span class="text-error"><?php echo $error['XLocation']; ?></span>
				</div>
				<div class="form-group">
					<label>Y Coordinate</label>
					<input name="YLocation" type="text" value="<?php echo $_POST['YLocation']; ?>" autocomplete="off" class="form-control" />
					<span class="text-error"><?php echo $error['YLocation']; ?></span>
				</div>
				
				<div class="form-group">
					<label>Image of Place</label>
					<input name="PictureFile" type="text" value="<?php echo $_POST['PictureFile']; ?>" autocomplete="off" class="form-control" />
					<span class="text-error"><?php echo $error['PictureFile']; ?></span>
				</div>
				
				
				
				<!-- submit button -->
				<div class="form-group">
					<input name="submit" type="submit" value="AddNew Location" class="btn btn-large btn-primary" />
				</div>
				
			</form>
			
			<!-- sign in link -->
			<a href="findLocation.php">Back</a>
			
		</div>
	
	</body>
</html>