<?php
/**
 * Created by PhpStorm.
 * User: BRETT
 * Date: 4/28/16
 * Time: 8:45 PM
 */

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
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

<script>
    jQuery(function($) {
        $('.sortable').sortable({
            items: ".item",
            axis: "y",
            stop: function(event, ui) {
                ui.item.effect('highlight');
            },
            update: function(event, ui) {
                // update server here
            }
        });
    });

</script>

<table class="sortable" border="1" style="background-color:#f6d8ae;border-collapse:collapse;border:1px solid #007fff;color:#000000;width:100%" cellpadding="10" cellspacing="3">
    <tr>
        <th>Time</th>
        <th>Know Before You Go</th>
    </tr>
    <tr>
        <td>12:00 AM</td>
        <td class="item">LOCATION NAME1</td>
    </tr>
    <tr>
        <td>12:30 AM</td>
        <td class="item">LOCATION NAME2</td>
    </tr>
    <tr>
        <td>1:00 AM</td>
        <td class="item">LOCATION NAME3</td>
    </tr>
    <tr>
        <td>1:30 AM</td>
        <td class="item">LOCATION NAME4</td>
    </tr>
    <tr>
        <td>2:00 AM</td>
        <td class="item">LOCATION NAME5</td>
    </tr>
    <tr>
        <td>2:30 AM</td>
        <td class="item">LOCATION NAME6</td>
    </tr>
    <tr>
        <td>3:00 AM</td>
        <td class="item">LOCATION NAME7</td>
    </tr>
    <tr>
        <td>3:30 AM</td>
        <td class="item">LOCATION NAME8</td>
    </tr>
    <tr>
        <td>4:00 AM</td>
        <td class="item">LOCATION NAME9</td>
    </tr>
    <tr>
        <td>4:30 AM</td>
        <td class="item">LOCATION NAME10</td>
    </tr>
    <tr>
        <td>5:00 AM</td>
        <td class="item">LOCATION NAME11</td>
    </tr>
    <tr>
        <td>5:30 AM</td>
        <td class="item">LOCATION NAME12</td>
    </tr>
    <tr>
        <td>6:00 AM</td>
        <td class="item">LOCATION NAME13</td>
    </tr>
    <tr>
        <td>6:30 AM</td>
        <td class="item">LOCATION NAME14</td>
    </tr>
    <tr>
        <td>7:00 AM</td>
        <td class="item">LOCATION NAME15</td>
    </tr>
    <tr>
        <td>7:30 AM</td>
        <td class="item">LOCATION NAME16</td>
    </tr>
    <tr>
        <td>8:00 AM</td>
        <td class="item">LOCATION NAME17</td>
    </tr>
    <tr>
        <td>8:30 AM</td>
        <td class="item">LOCATION NAME18</td>
    </tr>
    <tr>
        <td>9:00 AM</td>
        <td class="item">LOCATION NAME19</td>
    </tr>
    <tr>
        <td>9:30 AM</td>
        <td class="item">LOCATION NAME20</td>
    </tr>
    <tr>
        <td>10:00 AM</td>
        <td class="item">LOCATION NAME21</td>
    </tr>
    <tr>
        <td>10:30 AM</td>
        <td class="item">LOCATION NAME22</td>
    </tr>
    <tr>
        <td>11:00 AM</td>
        <td class="item">LOCATION NAME23</td>
    </tr>
    <tr>
        <td>11:30 AM</td>
        <td class="item">LOCATION NAME24</td>
    </tr>
    <tr>
        <td>12:00 PM</td>
        <td class="item">LOCATION NAME25</td>
    </tr>
    <tr>
        <td>12:30 PM</td>
        <td class="item">LOCATION NAME26</td>
    </tr>
    <tr>
        <td>1:00 PM</td>
        <td class="item">LOCATION NAME27</td>
    </tr>
    <tr>
        <td>1:30 PM</td>
        <td class="item">LOCATION NAME28</td>
    </tr>
    <tr>
        <td>2:00 PM</td>
        <td class="item">LOCATION NAME29</td>
    </tr>
    <tr>
        <td>2:30 PM</td>
        <td class="item">LOCATION NAME30</td>
    </tr>
    <tr>
        <td>3:00 PM</td>
        <td class="item">LOCATION NAME31</td>
    </tr>
    <tr>
        <td>3:30 PM</td>
        <td class="item">LOCATION NAME32</td>
    </tr>
    <tr>
        <td>4:00 PM</td>
        <td class="item">LOCATION NAME33</td>
    </tr>
    <tr>
        <td>4:30 PM</td>
        <td class="item">LOCATION NAME34</td>
    </tr>
    <tr>
        <td>5:00 PM</td>
        <td class="item">LOCATION NAME34</td>
    </tr>
    <tr>
        <td>5:30 PM</td>
        <td class="item">LOCATION NAME35</td>
    </tr>
    <tr>
        <td>6:00 PM</td>
        <td class="item">LOCATION NAME36</td>
    </tr>
    <tr>
        <td>6:30 PM</td>
        <td class="item">LOCATION NAME37</td>
    </tr>
    <tr>
        <td>7:00 PM</td>
        <td class="item">LOCATION NAME38</td>
    </tr>
    <tr>
        <td>7:30 PM</td>
        <td class="item">LOCATION NAME39</td>
    </tr>
    <tr>
        <td>8:00 PM</td>
        <td class="item">LOCATION NAME40</td>
    </tr>
    <tr>
        <td>8:30 PM</td>
        <td class="item">LOCATION NAME41</td>
    </tr>
    <tr>
        <td>9:00 PM</td>
        <td class="item">LOCATION NAME42</td>
    </tr>
    <tr>
        <td>9:30 PM</td>
        <td class="item">LOCATION NAME43</td>
    </tr>
    <tr>
        <td>10:00 PM</td>
        <td class="item">LOCATION NAME44</td>
    </tr>
    <tr>
        <td>10:30 PM</td>
        <td class="item">LOCATION NAME45</td>
    </tr>
    <tr>
        <td>11:00 PM</td>
        <td class="item">LOCATION NAME46</td>
    </tr>
    <tr>
        <td>11:30 PM</td>
        <td class="item">LOCATION NAME47</td>
    </tr>
    


</table>

<div class="button1">
    <a href="letsgo.php">
        <button class="btn btn-default" id="Back" type="button">Back</button>
</div>


</body>
</html>




