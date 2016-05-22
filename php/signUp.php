<?php

// include configuration file
include('../config.php');

// connect to the database
$dbc = @mysqli_connect($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

// continue session
session_start();

// if the form has been submitted
if (isset($_POST['submit'])) {
    // create an empty error array
    $error = array();


    // check for a firstname
    if (empty($_POST['FirstName'])) {
        $error['FirstName'] = 'Required field';
    }

    // check for a lastname
    if (empty($_POST['LastName'])) {
        $error['LastName'] = 'Required field';
    }

    // check for a email
    if (empty($_POST['Email'])) {
        $error['Email'] = 'Required field';
    } else {

        // check to see if email address is unique
        $email = mysqli_real_escape_string($dbc, $_POST['Email']);
        $query = "select user_id from Login where Email ='" + $email + "'";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) > 0) {
            $error['Email'] = 'You already have an account';
        }
    }

    // check for a username
    if (empty($_POST['UserName'])) {
        $error['UserName'] = 'Required field';
    } else {
        //check to see if user name is already taken
        $uname = mysqli_real_escape_string($dbc, $_POST['UserName']);
        $query = "select user_id from Login where UserName ='" + $uname + "'";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) > 0) {
            $error['UserName'] = 'that user name already exists';

        }

    }

    // check for a password
    if (empty($_POST['Password'])) {
        $error['Password'] = 'Required field';
    }

    // if there are no errors
    if (sizeof($error) == 0) {
        // insert user into the users table
        $pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        $first = mysqli_real_escape_string($dbc, $_POST['FirstName']);
        $last = mysqli_real_escape_string($dbc, $_POST['LastName']);

        $query = "INSERT INTO Login (
					user_id, 
					UserName, 
					FirstName, 
					LastName, 
					Email,
					Password,
					signupdate
				) VALUES (
					null,
					'{$uname}',
					'{$first}',
					'{$last}',
					'{$email}',
					'{$pass}',
					NOW()
					)";
        $result = mysqli_query($dbc, $query);

        // obtain user_id from table
        $user_id = mysqli_insert_id($dbc);
        // send a signup e-mail to user
        $message = "Dear {$_POST['FirstName']} {$_POST['LastName']},\n";
        $message = $message . "Thank you for signing up!\n";
        mail($_POST['Email'], 'Sign up confirmation', $message, "From: letsgo.helpdesk@gmail.com");

        // append user_id to session array
        $_SESSION['user_id'] = $user_id;
        $_SESSION['FirstName'] = $_POST['FirstName'];
        $_SESSION['LastName'] = $_POST['LastName'];

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
        <h1><a href="letsgo.php">Let's Go</a></h1>
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

    <h2>Sign up</h2>

    <!-- signup form -->
    <form method="post" action="signUp.php">

        <!-- user name -->
        <div class="form-group">
            <label>User Name</label>
            <input name="UserName" type="text" value="<?php echo $_POST['UserName']; ?>" autocomplete="off"
                   class="form-control"/>
            <span class="text-error"><?php echo $error['UserName']; ?></span>
        </div>

        <!-- first name -->
        <div class="form-group">
            <label>First Name</label>
            <input name="FirstName" type="text" value="<?php echo $_POST['FirstName']; ?>" autocomplete="off"
                   class="form-control"/>
            <span class="text-error"><?php echo $error['FirstName']; ?></span>
        </div>

        <!-- last name -->
        <div class="form-group">
            <label>Last Name</label>
            <input name="LastName" type="text" value="<?php echo $_POST['LastName']; ?>" autocomplete="off"
                   class="form-control"/>
            <span class="text-error"><?php echo $error['LastName']; ?></span>
        </div>

        <!-- e-mail -->
        <div class="form-group">
            <label>E-mail</label>
            <input name="Email" type="text" value="<?php echo $_POST['Email']; ?>" autocomplete="off"
                   class="form-control"/>
            <span class="text-error"><?php echo $error['Email']; ?></span>
        </div>

        <!-- password -->
        <div class="form-group">
            <label>Password</label>
            <input name="Password" type="password" autocomplete="off" class="form-control"/>
            <span class="text-error"><?php echo $error['Password']; ?></span>
        </div>

        <!-- submit button -->
        <div class="form-group">
            <input name="submit" type="submit" value="Sign up" class="btn btn-large btn-primary"/>
        </div>

    </form>

    <!-- sign in link -->
    <p>Already have an account? <a href="signIn.php">Sign in</a>!</p>

</div>

</body>
</html>