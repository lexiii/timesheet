<div class='outer'>
<div class='inner'>
<div class='inner-inner'>
<div class='title-card card'>
<span class='w1'>Time</span><span class='w2'>Sheet</span>
</div>
<div class='version'>
<a href="https://github.com/lexiii/timesheet" class='git' target="_blank">
V1.1<?php //echo VERSION; ?>
</a>
</div>
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="/" method="POST" >
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
            <a href="<?php echo url_rewrite("login","register"); ?>" class="forgot-password pull-right"> Register </a>
            <?php if($logo){ ?>
<div id='logo'><a href='https://github.com/lexiii/timesheet' target="_blank"><img src='img/github.png' /></a></div>
<?php } ?>
        </div><!-- /card-container -->
    </div><!-- /container -->
</div>
</div>
