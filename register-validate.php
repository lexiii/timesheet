<?php
$BYPASS_CHECKS = false;

// Details of connection
include("inc/db.php");
$tbl_name="users";

// Establish connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$user   =   $_POST['userName'];
$pass1  =   $_POST['password1'];
$pass2  =   $_POST['password2'];
$email  =   $_POST['email'];


// SANITISE

$user  = stripslashes($user);
$pass1 = stripslashes($pass1);
$pass2 = stripslashes($pass2);
$email = stripslashes($email);

$user  = mysql_real_escape_string($user);
$pass1 = mysql_real_escape_string($pass1);
$pass2 = mysql_real_escape_string($pass2);
$email = mysql_real_escape_string($email);

// VALIDATION

$error = 0;
$errorString = "";
if(!$BYPASS_CHECKS){
    if($error == 0&&$user==""){
        $error = 5;
        $errorString = "Username Field cannot be blank.";
    }
    if($error == 0&&$pass1!=$pass2){
        $error=1; // Passwords do not match
        $errorString = "Passwords do not match";
    }
    if ($error ==0&&!preg_match("/^(?=.*\d).{4,15}$/",$pass1)) {
        $error=2; // Password is not between 4-15 chars with a number
        $errorString = "Password must be between 4 and 15 characters long and include a number.";
    }
    if($error == 0&&!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error=3; // Email not valid
        $errorString = "Not a valid email address";
    }
    if($error == 0){
        $sql="SELECT * FROM $tbl_name WHERE userName='$user'";
        $result=mysql_query($sql);
        if(mysql_num_rows($result)==1){
            $error=4; // Username exists
            $errorString = "Username already exists. Please choose another one.";
        }
    }
}
if($error == 0){
    // create the user in the DB
    $password = $seed.$pass1;
//    $password = password_hash($password, PASSWORD_DEFAULT);
    //    fuck it. SHA1 will do.
    $password = SHA1($password);
    $sql = "INSERT INTO users (userName, password, email)
        VALUES ('$user', '$password', '$email')";

    if (mysql_query($sql)) {
        echo "Succesfully registered. Please <a href='index.php'>log in</a>.";
    } else {
        die("Cannot create user. Please try again later.".$sql);
    }
}else{
    header("location:register.php?er=".$errorString);
}
