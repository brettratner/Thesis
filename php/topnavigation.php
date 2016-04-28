<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <?php
                // If the user is signed in
                if ($_SESSION['user_id']) {
                    echo "<li><a href=\"activity.php\">Profile</a></li>";
                    echo "<li><a href=\"signout.php\">Sign Out</a></li>";
                } else {
                    echo "<li><a href=\"signIn.php\">Sign In</a></li>";
                    echo "<li><a href=\"signUp.php\">Sign Up</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>