<?php
$css = ["main"];
session_start();
$access_token = 1;
//if(!isset($_SESSION['username'])||!isset($access_token)){
if(!isset($_SESSION['username'])){
    die('INVALID PERMISSIONS');
}
include("inc/template/header.php");
include("inc/template/memberHeader.php");
date_default_timezone_set('Australia/Sydney'); // MOVE THIS TO SETTINGS

$userId = $_SESSION['userId'];

include_once("inc/db.php");
$tbl_name="timesheet";

?>
<div class='container'>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <?php
// Establish connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name WHERE userId='$userId' ORDER BY startTime";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    echo "<table class='table table-hover'>";
?>
    <thead>
    <tr>
    <th> Start Time </th>
    <th></th>
    <th> End Time </th>
</tr>
</thead>
<tbody>
<?php
    while($row = mysql_fetch_assoc($result)) {
        $startTime = strtotime($row['startTime']);
        $startTime = date("m/d/Y",$startTime)."<br/>".date("H:i",$startTime);
        if(isset($row['endTime'])){
            $endTime = strtotime($row['endTime']);
            $endTime = date("m/d/Y",$endTime)."<br/>".date("H:i",$endTime);
        }else{
            $endTime = "STILL CLOCKED IN";
        }
        echo "<tr>".
            "<td>".
            $startTime.
            "</td>".
            "<td>".
            "<p>- to -</p>".
            "</td>".
            "<td>".
            $endTime.
            "</td>".
            "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}
?>
<div>
</div>
</div>
</div>
<div>
<div class='text-center'>
<a href='landing.php' class='btn btn-default btn-lg'>Back</a>
<div>
<br>
<?php include "inc/template/footer.php"; ?>

    </body>
</html>
