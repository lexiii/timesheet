<?php
    session_start();

// Details of connection
include("../inc/db.php");
$tbl_name="users";

// Establish connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$myusername=$_POST['name'];
$mypassword=$_POST['password'];

// SANITISE
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);


$password = sha1($seed.$mypassword);

$sql="SELECT * FROM $tbl_name WHERE userName='$myusername' and password='$password'";
$result=mysql_query($sql);
if(mysql_num_rows($result)==1){
    while($row = mysql_fetch_assoc($result)) {
        $_SESSION['userId']=$row["id"];
    }
    $_SESSION['username']=$myusername;
    header("location:../landing.php");
}
else {
    echo "Wrong Username or Password. Try again.";
?>
        <form action="login.php" method="POST" >
            <label for="name">Username</label>
            <input type='text' name="name"></input>
            <label for="password">Password</label>
            <input type='password' name="password"></input>
            <button type="submit">Login</button>
        </form>
<?
}

?>
