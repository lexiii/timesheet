<?php
session_start();
// If logged in, go to landing
if(isset($_SESSION['username'])){
    header("location:landing.php");
}
$title="Login";
$css = ["login"];
include("header.php");
?>
    <body>
<div class='outer'>
<div class='inner'>
<div class='inner-inner'>
<div class='title-card card'>
<span class='w1'>Time</span><span class='w2'>Sheet</span>
</div>
<div class='version'>
V0.01
</div>
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="login.php" method="POST" >
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
            <a href="register.php" class="forgot-password pull-right"> Register </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</div>
</div>
<?php include "footer.php"; ?>
    </body>
</html>