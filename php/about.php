<?php
/**
 * Created by PhpStorm.
 * User: BRETT
 * Date: 4/29/16
 * Time: 9:54 AM
 */
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

<!-- top navigation -->
<!-- <?php include('topnavigation.php'); ?> -->

<header>
    <div id="letsgo">
        <h1><a href="../index.php">Let's Go</a></h1>
    </div>
    <div class="navigation">
        <ul class="links">

            <div class="notsignedin">
                <li><a href="about.php">About</a></li>
            </div>
        </ul>
    </div>

    <div id="toggle" onclick="toggleNav();">
        <i class="fa fa-bars fa-3x"></i>
    </div>
</header>

<!-- content -->
<div class="container" style="margin-top: 65px">

    <div class="aboutTitle">
        <img src="../imgs/Brett.png" alt="Brett Ratner" style="width:350px;height:350px">

        <h2>About the Developer</h2>
    </div>

    <div class="aboutMe">
      <p>
          My name is Brett Ratner, I am a senior majoring in Interactive Multimedia with a minor
          in Computer Science. To create my senior thesis, I used my knowledge in java and swift
          to create my senior thesis as a mobile app. Complications arose which inspired me to
          turn the project into a website using my skills in HTML, JavaScript, CSS, and PHP, and
          MYSQL. After graduation my plans are to enter a career as a software engineer, or a
          full stack web developer.
      </p>
    </div>

<div class="aboutTitle">
    <h2>About Let's Go</h2>
</div>

    <div class="aboutThesis">
        <p>
            “Let’s Go” is a mobile application that allows people to update and view the waiting time of crowded
            restaurants, movie theaters, supermarkets and many other locations people commonly go.
            This app will enable you to make an educated prediction of how long a wait will be at your
            destination before you leave the house. You now have the ability to decide if a crowded restaurant
            is worth the wait, choose a quieter time or eat somewhere else altogether.  The very people using
            the app are able to monitor and update the information to keep the data current and accurate. There
            are many more new and excting features that might just change the way you plan you plan your day.
            It’s a fast-paced world~use your time wisely!
        </p>
    </div>



</div>


</body>
</html>