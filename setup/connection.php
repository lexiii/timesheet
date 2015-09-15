<?php
    class Db
    {
        private static $instance = NULL;

        private function __construct() { }

        private function __clone() { }

        public static function getInstance() {
            if(!isset(self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                try{
                    self::$instance = new PDO("mysql:host=".SQLHost,SQLUsername,SQLPassword, $pdo_options);
                }catch(Exception $e){
//                    die($e);
                    $do_setup = TRUE;
                }
                if($do_db){
                    try{
                        self::$instance->query("use ".SQLDB);
                    }catch(Exception $e){
                        die($e);
                    }
                }
            }
            return self::$instance;
        }
    }
?>

