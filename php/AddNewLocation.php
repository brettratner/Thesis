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

// if the form has been submitted
if (isset($_POST['submit'])) {
    // create an empty error array
    $error = array();


    // check for a LocationName
    if (empty($_POST['LocationName'])) {
        $error['LocationName'] = 'Required field';
    }

    // check for a Address
    if (empty($_POST['Address'])) {
        $error['Address'] = 'Required field';
    }


    // check for a image
    if (empty($_FILES['image'])) {
        $error['image'] = 'Required field';
    }

    // if there are no errors
    if (sizeof($error) == 0) {

        $locName = mysqli_real_escape_string($dbc, $_POST['LocationName']);
        $address = mysqli_real_escape_string($dbc, $_POST['Address']);

        // insert info into the letsgo table
        $query = "INSERT INTO LetsGo (
					id, 
					LocationName, 
					Address, 
					timeEntered
				) VALUES (
					null,
					'{$locName}',
					'{$address}',
					NOW()
					)";


        $result = mysqli_query($dbc, $query);

        $sql = "SELECT `id` FROM `LetsGo` WHERE `Address`='{$address}' AND `LocationName`='{$locName}'";
        $result = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];


        if (!empty($_FILES['image'])) {
            $f = $_FILES['image'];
            if ($f["error"] !== UPLOAD_ERR_OK) {
                echo "An error occured";
            }
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            //test comment
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
                echo "Only jpg, jpeg, or png please";
            }

            $fname = $id . '.jpg';

            $success = move_uploaded_file($f['tmp_name'], "../imgs/" . $fname);

            if (!$success) {
                echo 'An error has occurred';
                echo "~/public_html/thesis/imgs/" . $fname;
            }

        }

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


    <script src="https://code.jquery.com/jquery-2.2.2.min.js"
            integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
            crossorigin="anonymous"></script>

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Bootstrap/css/font-awesome.css">
    <link href="../css/mainStyle.css" type="text/css" rel="stylesheet">


</head>
<body>

<!-- top navigation -->
<!-- <?php include('topnavigation.php'); ?> -->
<div id="letsgo">
    <h1><a href="../index.php">Let's Go</a></h1>
</div>
<header>

    <div class="navigation">
        <ul class="links">
            <div class="topnav">
                <li><a href="Settings.php">Settings</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </div>
        </ul>
    </div>

    <div id="toggle" onclick="toggleNav();">
        <i class="fa fa-bars fa-3x"></i>
    </div>
</header>

<!-- content -->
<div class="container" style="margin-top: 65px">

    <h2>Add New Location</h2>

    <!-- signup form -->
    <form method="post" action="AddNewLocation.php" enctype="multipart/form-data">


        <!-- location name -->
        <div class="form-group">
            <label>Location Name</label>
            <input name="LocationName" type="text" value="<?php echo $_POST['LocationName']; ?>" autocomplete="off"
                   class="form-control"/>
            <span class="text-error"><?php echo $error['LocationName']; ?></span>
        </div>

        <!-- XPosition of location -->
        <div class="form-group">
            <label>Address of Location</label>
            <input name="Address" type="text" value="<?php echo $_POST['Address']; ?>" autocomplete="off"
                   class="form-control"/>
            <span class="text-error"><?php echo $error['Address']; ?></span>
        </div>


        <div class="form-group">
            <label>Image of Place</label>
            <input type="file" name="image" id="image"/>
        </div>


        <!-- submit button -->
        <div class="form-group">
            <input name="submit" type="submit" value="AddNew Location" class="btn btn-large btn-primary"/>
        </div>

    </form>

    <!-- sign in link -->
    <a href="findLocation.php">Back</a>

</div>


</body>
</html>