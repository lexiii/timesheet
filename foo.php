<?php
session_start();
date_default_timezone_set('Australia/Sydney');
$userId = $_SESSION['userId'];
include_once("inc/db.php");
$tbl_name="timesheet";

// Establish connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name WHERE userId='$userId' ORDER BY startTime DESC LIMIT 1";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    $inSession;
    while($row = mysql_fetch_assoc($result)) {
        $inSession = !isset($row['endTime']);
    }
    echo ($inSession?"":"Not ")."Clocked In";
} else {
    echo "No records for ".$userName;
}
?>
