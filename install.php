<?php
$passd = "bacon";//CHANGE THIS
   include("inc/db.php");

// Create connection
$conn = mysqli_connect($host, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE ".$db_name;
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

$conn = mysqli_connect($host, $username, $password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// create table
$sql = "CREATE TABLE timesheet (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(11) UNSIGNED NOT NULL,
startTime TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
endTime TIMESTAMP  NULL,
totalTime BIGINT(11) UNSIGNED
)";

if (mysqli_query($conn, $sql)) {
  //  echo "Table timesheet created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// create table
$sql = "CREATE TABLE users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userName VARCHAR(255),
password VARCHAR(255),
email  VARCHAR(255),
startDate TIMESTAMP,
role  INT(11)
)";

if (mysqli_query($conn, $sql)) {
 //   echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$pass = sha1($seed.$passd);
$sql = "INSERT INTO users (userName,password, role) VALUES ('admin','".$pass."','0')";

if (mysqli_query($conn, $sql)) {
//    echo "Admin user Created ";
} else {
    echo "Error creating admin user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
