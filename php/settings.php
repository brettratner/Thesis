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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://code.jquery.com/jquery-2.2.2.min.js"
            integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
            crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
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

<input id="demo_vertical2" type="number" value="" name="demo_vertical2">
<div class="container">
    <div class="page-header">
        <h1>Settings</h1></div>
    <div class="input-group spinner">
        <input type="text" class="form-control" value="1">
        <div class="input-group-btn-vertical">
            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
        </div>
    </div>
</div>


<script src="/javascripts/application.js" type="text/javascript">
    (function ($) {
        $('.spinner .btn:first-of-type').on('click', function () {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function () {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
        });
    })(jQuery);

</script>

</body>
</html>
