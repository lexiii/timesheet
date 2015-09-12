<?php
if(!isset($_SESSION['username'])||!isset($access_token)){
    die('INVALID PERMISSIONS');
}
$welcomeString =
"Welcome, ".$_SESSION['username'].".";
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="landing.php">Timesheet</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="settings.php">Settings</a></li>
        <li><a href="actions/logout.php">Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href='#'><?php echo $welcomeString; ?></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
