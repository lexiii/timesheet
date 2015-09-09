<!DOCTYPE HTML>
<HTML>
<head>
<title>
TIMESHEET INSTALLER
</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<body>

<?php
include ('inc/db.php');
if(isset($host)){
    if(!isset($_GET['manual'])){
        echo "A config file for timesheet has already been created.";
        die();
    }
}
$config = 'inc/db.php';
$err = -1;
if(isset($_POST['username'])){
    $err=0;
    $name = $_POST['username'];
    $email = $_POST['email'];
    $p1 = $_POST['pass1'];
    if(!isset($host)){
        $p2 = $_POST['pass2'];
        $hostName = $_POST['DBh'];
        $DBuser = $_POST['DBu'];
        $DBpass = $_POST['DBp'];
        $DBdatabase = $_POST['DBdb'];
    }
    $msg = [];
    if(strlen($name)<3||strlen($name)>11){
        $err++;
        array_push($msg,"name must be between 3 and 11 charicters long");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err++;
        array_push($msg,"email is not valid");
    }
    if($p1!=$p2){
        array_push($msg,"passwords do not match");
        $err++;
    }
    if(strlen($p1)<3||strlen($p1)>20){
        $err++;
        array_push($msg,"password must be between 3 and 20 chars");
    }
    if($DBuser==""){
        $err++;
        array_push($msg,"DB User cannot be blank");
    }
    if($DBpass==""){
        $err++;
        array_push($msg,"DB Password cannot be blank");
    }
    if($DBdatabase==""){
        $err++;
        array_push($msg,"DB Database cannot be blank");
    }
    if(isset($_GET['manual'])){
        $err =0;
    }
//    $err=0;//DEBUG
}
if($err!=0){
?>
<div class="container-fluid">
    <section class="container">
        <div class="container-page">
<form action="" method="post">
            <div class="col-md-6">
                <h3 class="dark-grey">TIMESHEET SETUP</h3>
<?php
    if($err > 0){
        echo '<div class="alert alert-danger" role="alert">There are errors in your form:<br/>';

        foreach($msg as $er){
            echo $er."<br/>";
        }
        var_dump($_POST);
echo '</div>';
    }
?>
                <h4 class="dark-grey">Admin User</h3>
                <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12">
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input type="password" name="pass1" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Repeat Password</label>
                    <input type="password" name="pass2" class="form-control" id="" value="">
                </div>
                <h4>Database </h4>
                <div class="form-group col-lg-12">
                    <label>Host</label>
                    <input type="text" name="DBh" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input type="text" name="DBu" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12">
                    <label>Password</label>
                    <input type="password" name="DBp" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12">
                    <label>Database:</label>
                    <input type="text" name="DBdb" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12 text-right">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            </div>

            <div class="col-md-6">
                <h3 class="dark-grey">WELCOME TO TIMESHEET</h3>
                <p>
Put some intro text here. maybe a picture?
                </p>

            </div>
        </div>
    </section>
</div>
<?php
}else{
    if ((!is_writable($filename))&&(!isset($host))) {
?>
<div class='container'>
<h1>Config file is not writable</h1>
<p>Copy the text below to inc/db.php and then continue </p>
<pre>
&lt;?php
<?php
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGIJKLMNOPQRSTUVWXYZ0123456789';
        $string = '';
        for ($i = 0; $i < 10; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }

        echo '$host = "'.$hostName."\";\n";
        echo '$username = "'.$DBuser."\";\n";
        echo '$password = "'.$DBpass."\";\n";
        echo '$db_name = "'.$DBdatabase."\";\n";
        echo '$seed = "'.$string."\";\n";
?>
?&gt;
</pre>
<form action="install.php?manual" method="post">
<input type='hidden' name='username' value="<?php echo $name; ?>"/>
<input type='hidden' name='email' value="<?php echo $email; ?>"/>
<input type='hidden' name='pass1' value="<?php echo $p1; ?>"/>
<input type='hidden' name='pass2' value="<?php echo $p2; ?>"/>
<input type='submit' value='Continue' class='btn btn-primary'/>
</form>
</div>
<?php
        die();
    }
//    var_dump($_POST);
 //   die();
    $passd = "bacon";//CHANGE THIS
    // CHECK TO SEE IF DB EXISTS. IF SO, DIE
    $link = mysql_connect("$host", "$username", "$password");
    if (!$link) {
        die('Not connected : ' . mysql_error());
    }
    $db_selected = mysql_select_db("$db_name", $link);
    if ($db_selected) {
        die("Timesheet database already exists");
    }
    // END CHECK

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

}
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
