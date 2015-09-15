<?php
    class Login{
        private $username;
        private $password;

        public function setLogin($username, $password){
            $this->username = $username;
            $this->password = $password;
        }

        public function doLogin(){
            $username = $_POST['name'];
            $password = $_POST['password'];
            $hash = md5($password);
            $db = Db::getInstance();
            $req = $db->query("SELECT * FROM users WHERE userName = '".$username."' AND password = '".$hash."'");
            $req -> execute();
            $result = $req->fetch();
            if($result){
                $_SESSION['userId']=$result["id"];
                $_SESSION['username']=$result["userName"];
            }else{
    //            echo "WRONG!";
            }
?>
<script>
window.location = "/";
</script>
    <?php
        }
    }
?>
