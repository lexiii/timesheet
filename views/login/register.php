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
    <h1 class='text-center'><small>Register</small></h1>
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo url_rewrite('login','register2'); ?>" method="POST" >
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name='name' id="name" class="form-control" placeholder="Username" required autofocus>
                <input type="email" name='email' id="email" class="form-control" placeholder="Email" required autofocus>
<div class="row">
  <div class="col-md-9">
                <input type="password" name='password' id="password" class="form-control" placeholder="Password" required>
</div>
</div>
<div class="row">
  <div class="col-md-3">
</div>
  <div class="col-md-9">
                <input type="password" name='password2' id="password2" class="form-control" placeholder="Again" required>

</div>
</div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign Up</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password"> Forgot your password? </a>
            <a href="<?php echo url_rewrite("login","home"); ?>" class="forgot-password pull-right"> Login </a>
            <?php if($logo){ ?>
<div id='logo'><a href='https://github.com/lexiii/timesheet' target="_blank"><img src='img/github.png' /></a></div>
<?php } ?>
        </div><!-- /card-container -->
    </div><!-- /container -->
</div>
</div>
