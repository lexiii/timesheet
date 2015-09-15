<?php
    class LoginController {
        public function home(){
            if(isset($_POST['name'])){
                require_once('models/login.php');
                $login = Login::setLogin($_GET['name'],$_GET['password']);
                Login::doLogin();

                require_once('views/login/log.php');
            }else{
                require_once('views/login/home.php');
            }
        }
        public function register(){
            require_once('views/login/register.php');
        }
        public function logout(){
            session_destroy();
            require_once('views/login/logout.php');
        }
        public function error(){
            require_once('views/login/error.php');
        }
    }

?>
