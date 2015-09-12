<?php
session_start();
// CHECK TO SEE IF DB EXISTS. IF NOT, LINK TO INSTALL.PHP
include_once('inc/db.php');
$link = mysql_connect("$host", "$username", "$password");
if (!$link) {
    die('Not connected : ' . mysql_error());
}
$db_selected = mysql_select_db("$db_name", $link);
if (!$db_selected) {
    include('install.php');
    die();
    //    die("Timesheet has not been installed. Click <a href='install.php'>here</a> to install it.");
}
// END CHECK
// If logged in, go to landing
if(isset($_SESSION['username'])){
    header("location:landing.php");
}
$title="Login";
$css = ["login"];
include("inc/template/header.php");
?>
    <body>
<div class='outer'>
<div class='inner'>
<div class='inner-inner'>
<div class='title-card card'>
<span class='w1'>Time</span><span class='w2'>Sheet</span>
</div>
<div class='version'>
V0.02a
</div>
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="actions/login.php" method="POST" >
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name='name' id="name" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name='password' id="password" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password"> Forgot your password? </a>
            <a href="actions/register.php" class="forgot-password pull-right"> Register </a>
<div id='logo'><a href='https://github.com/lexiii/timesheet' target="_blank"><img src='img/github.png' /></a></div>
        </div><!-- /card-container -->
    </div><!-- /container -->
</div>
</div>
<?php include "inc/template/footer.php"; ?>
    </body>
</html>
