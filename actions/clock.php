<?php
$access_token = 1;
session_start();
if(!isset($_SESSION['username'])){
    header("location:../index.php");
}
$tbl_name="timesheet";
include_once("../inc/db.php");
$userId = $_SESSION['userId'];
// Establish connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name WHERE userId='$userId' ORDER BY startTime DESC LIMIT 1";
$result = mysql_query($sql);
$latest;
if (mysql_num_rows($result) > 0) {
    $inSession;
    while($row = mysql_fetch_assoc($result)) {
        $inSession = !isset($row['endTime']);
        $latest = $row['id'];
    }
}
if($inSession){
$sql = "UPDATE $tbl_name SET endTime=now() WHERE id=$latest";
    if (mysql_query($sql)) {
//        echo "Succesfully registered. Please <a href='index.php'>log in</a>.";
    } else {
        die("Cannot clock in/out!<br/>".$sql);
    }
}else{
    $sql = "INSERT INTO $tbl_name (userId)
        VALUES ('$userId')";
    if (mysql_query($sql)) {
//        echo "Succesfully registered. Please <a href='index.php'>log in</a>.";
    } else {
        die("Cannot clock in/out!<br/>".$sql);
    }
}
    header("location:../landing.php");
?>
