<?php
$css = ["main"];
$access_token = 1;
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
include("header.php");
include("./memberHeader.php");
include_once("inc/db.php");
include_once("./functions.php");
$tbl_name="timesheet";
date_default_timezone_set('Australia/Sydney');
?>

<?php
$userId = $_SESSION['userId'];
// Establish connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name WHERE userId='$userId' ORDER BY startTime DESC LIMIT 1";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    $inSession;
    while($row = mysql_fetch_assoc($result)) {
        $inSession = !isset($row['endTime']);
?>

<div class='container'>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
   <?php echo "<h3>".($inSession?"Current ":"Last")." Session</h3>"; ?>
</h3>
  </div>
  <div class="panel-body">
<?
        $clockedIn =  "<h3 class='text-uppercase pull-right'><small>Clocked in ".relativeTime(strtotime($row['startTime']))."</small></h3>";
        $startTime = strtotime($row['startTime']);
        $startTime = "<p class='pDate'>".date("m/d/Y",$startTime)."</p><p class='pTime'>".date("H:i",$startTime)."</p>";
        if(!$inSession){
            $endTime = strtotime($row['endTime']);
            $endTime = "<p class='pDate'>".date("m/d/Y",$endTime)."</p><p class='pTime'>".date("H:i",$endTime)."</p>";
            //            $endTime = date("m/d/Y",$endTime)."<br/>".date("H:i",$endTime);
        }else{
            $endTime = "<p class='text-uppercase stillClocked'>Still Clocked In</p>";
        }
?>
<div class="row">
<div class="col-md-6 strt title from-title">
From. . .
</div>
<div class="col-md-6 strt from-title">
To. . .
</div>
</div>
<div class="row">
<div class="col-md-6 strt">
<div class='inner'>
<?php echo $startTime; ?>
</div>
</div>
<!--
<div class="col-md-2 strt">
<div class='vAlign'>
To
</div>
</div>
-->
<div class="col-md-6 strt">
<div class='inner'>
<?php echo $endTime; ?>
</div>
</div>
</div>
    <?php
    }
    echo "<br/>";
    echo $clockedIn;
    echo "<a href='clock.php' class='btn btn-danger btn-lg'>Clock ".($inSession?"Out":"In")."</a>";
} else {
    echo "No records for ".$_SESSION['username'];
    echo "</br><a href='clock.php' class='btn btn-danger btn-lg'>Clock In</a>";
}
?>
  </div>
</div>
<div class='text-center'>
<a href='timesheet.php' class='btn btn-default btn-lg'>Full Timesheet</a>
</div>
</div>

<?php include "footer.php"; ?>

    </body>
</html>
