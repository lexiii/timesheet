<?php
class SetupController{
    public function setup(){
        require_once('../config.php');
        if(isset($SQLDB)){
            require_once('views/user.php');
        }else{
            require_once('views/setup.php');
        }
    }
    public function dbSub(){
        $db = Database::validate($_POST);
        if(is_array($db)){
            if (is_writable("../config.php")){
                echo "WRITABLE";
            }else{
                require_once('views/unwrite.php');
            }
        }else{
            $er = $db;
            require_once('views/setup.php');
        }
    }
    public function make(){
        require_once('../config.php');
        if(isset($SQLDB)){
            require_once('connection.php');

        }else{
            require_once('views/redirect.php');
        }
    }
    public function user(){
        require_once('views/user.php');
    }
    public function userSub(){
        $db = User::validate($_POST);
        if($db['errors']!=0){
            require_once('views/user.php');
        }else{
                $create = SQL::create($db['data']);
                if($create){
                    require_once('views/done.php');
                }else{
                    require_once('views/redirect.php');
                }
        }
        }
    public function error(){
        echo "PAGE NOT FOUND";
    }
}
?>
