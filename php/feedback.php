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
?>

<!DOCTYPE html>
<html>

		
	<head>
		<title>Let's Go</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  
		<script src="https://code.jquery.com/jquery-2.2.2.min.js"
            integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
            crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Bootstrap/css/font-awesome.css">
    <link href="../css/mainStyle.css" type="text/css" rel="stylesheet">

 <script>
        function toggleNav() {
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

            <li><a href="settings.php">Settings</a></li>
            <li><a href="feedback.php">Feedback</a></li>
			<li><a href="login_about.php">About</a></li>
            <li><a href="signout.php">Sign out</a></li>

        </ul>
    </div>

    <div id="toggle" onclick="toggleNav();">
        <i class="fa fa-bars fa-3x"></i>
    </div>
</header>


	<h2><?php echo "{$_SESSION['FirstName']} {$_SESSION['LastName']}"; ?></h2>

	<div class="container" style="margin-top: 65px">
		
		<?php
 
		$action = mysqli_real_escape_string($dbc, $_GET['action']);
 
//		// check for comment deletion
//		if($action == 'remove')
//		{
//			    $id = mysqli_real_escape_string($dbc, $_GET['id']);
//
//		$sql = "SELECT user_id FROM Feedback WHERE feedback_id = '{$id}' LIMIT 1";
//		$result = mysqli_query($dbc, $sql) or die('Query failed: ' . mysqli_error($dbc));
//		$row = mysqli_fetch_assoc($result);
//
//		// check ownership
//		if($row['user_id'] == $_SESSION['user_id']) {
//			// delete comment
//			$sql = "DELETE FROM Feedback WHERE feedback_id = '{$id}' LIMIT 1";
//			$result = mysqli_query($dbc, $sql) or die('Query failed: ' . mysqli_error($dbc));
//
//			// display confirmation
//			echo "<p class=\"text-success\">Your post has been removed</p>";
//		}
//		}
 
		// check for comment submission
		if(isset($_POST['submit']))
		{
			// empty error array
			$error = array();
		
			// check for a comment
			if(empty($_POST['comment']))
			{
				$error[] = 'A comment is required';
			}
		
			// if there are no errors, insert comment into the database.
			// otherwise, display errors.
			if(sizeof($error) == 0)
			{
				// Clean data
				$comment = mysqli_real_escape_string($dbc, $_POST['comment']);
		
				// Insert shout
				$sql = "INSERT INTO Feedback (feedback_id, comment, comment_date) VALUES (null, '$comment', NOW())";
				mysqli_query($dbc, $sql) or die('Query failed: ' . mysqli_error($dbc));
		
				// Display confirmation
				echo "<p class=\"text-success\">Your comment has been added</p>";
		
			} else {
		
				// Display error message
				foreach($error as $value)
				{
					echo "<div class=\"alert alert-danger\">{$value}</div>";
				}
		
			}
		}
		
		?>

			<h2>Let's Go Feedback Page</h2>
		<!-- Shoutbox form -->
		<form method="post" action="feedback.php" style="margin-bottom: 25px">
			<div class="form-group">
				<textarea name="comment" placeholder="Please put your feedback here <?php echo "{$_SESSION['FirstName']} {$_SESSION['LastName']}"; ?>" class="form-control"></textarea>
			</div>
			<div class = "button3">
				<input name="submit" type="submit" value="Send" class="btn btn-default" id="buttonSubmit" />

			</div>
		</form>
				

		<?php
		
		// select all comments from the database 
		$sql = "SELECT feedback_id, comment, DATE_FORMAT(comment_date,'%M %d, %Y') AS formatted_date FROM Feedback ORDER BY comment_date DESC";
		$result = mysqli_query($dbc, $sql) or die('Query failed: ' . mysqli_error($dbc));
		while ($row = mysqli_fetch_assoc($result)) 
		{
			// Display comment
			echo "<div class=\"panel panel-default\">";
			echo "<div class=\"panel-body\">";
			//echo "<a href=feedback.php?action=remove&id={$row['feedback_id']}\" class=\"btn btn-danger pull-right\"><i class=\"fa fa-times\"></i></a>";
			echo "<p>{$row['comment']}</p>";
			echo "<span class=\"text-muted\">Posted by: {$_SESSION['FirstName']} {$_SESSION['LastName']},  </span>";
			echo "<span class=\"text-muted\">{$row['formatted_date']}<span>";
			echo "</div>";
			echo "</div>";
		}
		
		?>
	
		</div>
	</body>
</html>