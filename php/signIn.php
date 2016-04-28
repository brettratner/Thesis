<?php

// include configuration file
include('../config.php');

// connect to the database
$dbc = @mysqli_connect($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

// continue session
session_start();

// if the submit button has been pressed
if (isset($_POST['submit'])) {
    // create an empty error array
    $error = array();

    // check for a email
    if (empty($_POST['UserName'])) {
        $error['UserName'] = 'Required field';
    }


    // check for a password
    if (empty($_POST['Password'])) {
        $error['Password'] = 'Required field';
    }


    // check signin credentials
    if (!empty($_POST['UserName']) && !empty($_POST['Password'])) {
        $user = mysqli_real_escape_string($dbc, $_POST['UserName']);
        // get user_id from the users table
        $query = "SELECT 
					user_id, 
					FirstName, 
					LastName,
					 Password
				FROM 
					Login 
				WHERE 
					UserName = '{$user}'
				LIMIT 1";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);

        if (password_verify($_POST['Password'], $row['Password'])) {
        } else {
            $error['user'] = 'Invalid username and/or password';
        }

        // if the user is not found
        if (!$row['user_id']) {
            $error['user'] = 'Invalid username and/or password';
        }
    }

    // if there are no errors
    if (sizeof($error) == 0) {
        // append user_id to session
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['FirstName'] = $row['FirstName'];
        $_SESSION['LastName'] = $row['LastName'];

        // redirect user to profile page
        header("Location: letsgo.php");
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

            <li><a href="settings.php">Settings</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </div>

    <div id="toggle" onclick="toggleNav();">
        <i class="fa fa-bars fa-3x"></i>
    </div>
</header>

<!-- content -->
<div class="container" style="margin-top: 65px">

    <h2>Sign in</h2>

    <?php
    // check for a user error
    if ($error['user']) {
        echo "<div class=\"alert alert-danger\">{$error['user']}</div>";
    }
    ?>

    <!-- signin form -->
    <form method="post" action="signIn.php">

        <!-- UserName -->
        <div class="form-group">
            <label>User Name</label><br/>
            <input name="UserName" type="text" value="<?php echo $_POST['UserName']; ?>" autocomplete="off"
                   class="form-control" placeholder="UserName"/>
            <span class="text-error"><?php echo $error['UserName']; ?></span>
        </div>

        <!-- password -->
        <div class="form-group">
            <label for="password">Password</label><br/>
            <input id="Password" name="Password" type="password" value="<?php echo $_POST['Password']; ?>"
                   autocomplete="off" class="form-control" placeholder="Password"/>
            <span class="text-error"><?php echo $error['Password']; ?></span>
        </div>

        <!-- submit button -->
        <div class="form-group">
            <input name="submit" type="submit" value="Sign in" class="btn btn-large btn-primary"/>
        </div>

    </form>

    <!-- sign up link -->
    <p>Don't already have an account? <a href="signUp.php">Sign up</a>!</p>
    <br/>
    <a href="../index.php">Back</a>

</div>

</body>
</html>