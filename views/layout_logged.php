<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php
if($styl){
    foreach($styl as $style){
?>
    <link rel="stylesheet" href="<?php echo $style; ?>">
<?
    }
}
?>
</head>
<body>
<?php $welcomeString = "Welcome, ".$_SESSION['username']."."; ?>
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
      <a class="navbar-brand" href="/">Timesheet</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Settings</a></li>
        <li><a href="<?php echo url_rewrite('login','logout'); ?>">Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href='#'><?php echo $welcomeString; ?></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<?php require_once('routes.php'); ?>


<hr>
footer
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
