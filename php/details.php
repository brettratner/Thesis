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

    <script type="text/javascript" src="../js/snap.svg.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"
            integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
            crossorigin="anonymous"></script>
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

<div id="letsgo">
    <h1><a href="letsgo.php">Let's Go</a></h1>
</div>
<header>

    <div class="navigation">
        <ul class="links">

            <li><a href="settings.php">Settings</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a class="navbar-brand" href="signout.php">Sign out</a></li>

        </ul>
    </div>

    <div id="toggle" onclick="toggleNav();">
        <i class="fa fa-bars fa-3x"></i>
    </div>
</header>


    <?php
    $id = mysqli_real_escape_string($dbc, $_GET['id']);

    $sql = "SELECT * FROM `LetsGo` WHERE id = '{$id}' LIMIT 1";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);

    $green = $row['Green'];
    $red = $row['Red'];
    $yellow = $row['Yellow'];

    $max = max(array($green, $red, $yellow));

    if ($max == $green) {
        $status = 'green';
    } else if ($max == $red) {
        $status = 'red';
    } else if ($max == $yellow) {
        $status = 'yellow';
    }
echo "<table  class= 'detailcolor' border='1' , width='75%%' , height='75px'>";
 echo "<tr>";
  echo "<td bgcolor=" . $status . "></td>";
   echo "</tr>";


echo "</table>";
echo "<div class='locationTitle'>";
    echo "<h1 class='Title'>{$row['LocationName']} </h1>";
    echo "<h3>{$row['Address']} </h3>";
    echo '<img src="../imgs/' . $row['id'] . '.jpg" alt="Image Not Found" style="max-width:400px;max-height:600px;">';
    echo "</div>";
    mysqli_close($dbc);

    ?>
</div>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
</script>
<div id="div1">
    <svg id="cvs" width="100%" height="400"></svg>
</div>
<div class="goback">
    <a href="findLocation.php">
        <button class="btn btn-default" id="AddNewLocation" type="button"> Go Back</button>
    </a>
</div>


</body>
<!-- <script type="text/javascript" src="../js/LocationUpdating.js"></script> -->
<?php include 'LocationUpdating.php'; ?>

</html>

