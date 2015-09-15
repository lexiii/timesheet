<?php
class SQL{
    public static function create($db){
        require_once('../config.php');
        if(isset($SQLDB)){
            try{
                $conn = new PDO("mysql:host=$SQLHost", $SQLUsername, $SQLPassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE DATABASE $SQLDB";
                $conn->exec($sql);
  //              echo "Database created successfully<br>";
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
               return FALSE;
            }
            try{
                $conn->query("use $SQLDB");
                $sqls = ["CREATE TABLE users (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    userName VARCHAR(255),
                        password VARCHAR(255),
                        email  VARCHAR(255),
                        startDate TIMESTAMP,
                        role  INT(11)
                    )",
                    "CREATE TABLE timesheet (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        userId INT(11) UNSIGNED NOT NULL,
                        startTime TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
                        endTime TIMESTAMP  NULL,
                        totalTime BIGINT(11) UNSIGNED
                    )"];
                foreach($sqls as $sql){
                    $conn->exec($sql);
                }
//                echo "Tables Created Successfully";
            }catch(PDOException $e){
               echo $sql . "<br>" . $e->getMessage();
               return FALSE;
            }
            try{
                $sql = "INSERT INTO users (userName,password,email, role) VALUES ('".$db['Username']."','".md5($db['pass1'])."','".$db['email']."', '0')";
                $conn->exec($sql);
//                echo "User Created successfully";
            }catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
               return FALSE;
            }
            return TRUE;
    }
}
}
class User{
    public static function validate($db){
        $database['Username']    = $db['Username'];
        $database['email']    = $db['email'];
        $database['pass1']    = $db['pass1'];
        $database['pass2']   = $db['pass2'];
        $err = 0;
        $errMsg = [];
        foreach($database as $key => $value){
            if($value==""){
                $err++;
                array_push($errMsg,$key." cannot be empty.");
            }
        }
        if(strlen($database['Username'])<2|| strlen($database['Username'])>=15){
            $err++;
            array_push($errMsg," Username must be between 2 and 15 chars long.");
        }
        if(strlen($database['pass1'])<6|| strlen($database['pass1'])>=30){
            $err++;
            array_push($errMsg," Password must be between 6 and 30 chars long.");
        }
        if($database['pass1']!==$database['pass2']){
            $err++;
            array_push($errMsg,"Passwords must match");
        }
        if (!filter_var($database['email'], FILTER_VALIDATE_EMAIL)) {
            $err++;
            array_push($errMsg,"You must enter a valid email.");
        }
        $results = array(
            "errors"    => $err,
            "errorMsg"  => $errMsg,
            "data"      => $database
        );
        return $results;
    }
    public static function post($db){
    }
}
class Database{
    public static function validate($db){
        $database = [];
        $database['DBh']    = $db['DBh'];
        $database['DBu']    = $db['DBu'];
        $database['DBp']    = $db['DBp'];
        $database['DBdb']   = $db['DBdb'];
        // SANITISE
        $er=0;
        foreach($database as $DBE){
            if(!isset($DBE)||$DBE==""){
                $er++;
            }
        }
        if($er==0){
            return $database;
        }else{
            return $er;
        }
    }
}
?>
