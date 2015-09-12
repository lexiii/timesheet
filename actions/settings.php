<?php
$access_token = 1;
session_start();
if(!isset($_SESSION['username'])){
    header("location:../index.php");
}
include("../inc/template/header.php");
include("../inc/template/memberHeader.php");
?>
<div class='container'>
    <h2>Settings</h2>
    <h4>Change Password</h4>
    <form>
    <label for="oldPass">Old Passowrd</label><br/>
    <input type="password" name="oldPass"></input><br/>
    <label for="newPass1">New Passowrd</label><br/>
    <input type="password" name="newPass1"></input><br/>
    <label for="newPass2">New Passowrd (again)</label><br/>
    <input type="password" name="newPass2"></input><br/>
<br/>
<button type="submit">Change Password</button>
    </form>
</div>
</body>
