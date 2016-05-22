


<!DOCTYPE html>
	<html>
    	<head>
    	
        	<title>Let's Go</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
			<script src="https://code.jquery.com/jquery-2.2.2.min.js"
			  	integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
			  	crossorigin="anonymous"></script>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
			<link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	 <link rel="stylesheet" href="Bootstrap/css/font-awesome.css">
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

	<header>
		<div id="letsgo">
			<h1><a href="letsgo.php">Let's Go</a></h1>
		</div>
		<div class="navigation">
			<ul class="links">
				<div class="notsignedin">
				<li><a href="php/about.php">About</a></li>
				</div>
			</ul>
		</div>

		<div id="toggle" onclick="toggleNav();">
			<i class="fa fa-bars fa-3x"></i>
		</div>
	</header>

 <div class= "loginSignup">
			<h4> 
				<a href="php/signIn.php">Sign in</a> /
			    <a href="php/signUp.php">Sign up</a>
			</h4>
		
		</div>
<div class="button1">
 <button class="btn btn-default disabled " id="findLocation" type="button">Find Location</button>
 </div>
 <div class="button2">
 <button class="btn btn-default disabled " id="FavoritePlaces" type="button">Favorite Places</button>
 </div>
 <div class="button3">
 <button class="btn btn-default disabled" id="AddNewLocation" type="button"> Add New Location</button>
</div>

		
	</body>
	</html> 
