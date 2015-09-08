<?php
session_start();

if(isset($_SESSION['username'])){
    header("location:landing.php");
}
include("header.php");
$error = isset($_GET['er'])?$_GET['er']:"";
?>
<body>
<h3> Register </h3>
<form action="register-validate.php" method="POST" >
<label for='userName'>Username</label>
<input type='text' name='userName'></input>
<br/>
<label for='password1'>Passowrd</label>
<input type='password' name='password1'></input>
<br/>
<label for='password2'>Password (again)</label>
<input type='password' name='password2'></input>
<br/>
<label for='email'>Email</label>
<input type='email' name='email'></input>
<br/>
<b>
<?php echo $error ?>
</b>
<br/>
<button type='submit'>Register</button>
<br/>
<br/>
[<a href='index.php'>Login</a>]
</form>
</body>
