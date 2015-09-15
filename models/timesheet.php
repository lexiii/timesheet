<?php
    class Timesheet{
        public $id;
        public $userId;
        public $startTime;
        public $endTime;
        public $totalTime;

        public function __construct($id,$userId,$startTime,$endTime,$totalTime) {
            $this->id           = $id;
            $this->userId       = $userId;
            $this->startTime    = $startTime;
            $this->endTime      = $endTime;
            $this->totalTime    = $totalTime;
        }

        public static function latest() {
            $db = Db::getInstance();
            $req = $db->query("SELECT * FROM timesheet WHERE userId='".$_SESSION['userId']."' ORDER BY id DESC  LIMIT 1");
            $req -> execute();
            $result = $req->fetch();
            if($result){
                return $result;
            }
        }

        public static function clock($res) {
            $db = Db::getInstance();
            if(!$res||isset($res['endTime'])){
                $req = $db->query("INSERT INTO timesheet (userId) VALUES ('".$_SESSION['userId']."')");
            }else{
                $req = $db->query("UPDATE timesheet SET endTime=now() where id=".$res['id']);
            }
        }

        public static function all() {
            $list = [];
            $db = Db::getInstance();
            $req = $db->query("SELECT * FROM timesheet WHERE userId='".$_SESSION['userId']."' ORDER BY id DESC");

            foreach($req->fetchAll() as $time){
                $list[] = new Timesheet($time['id'],$time['userId'],$time['startTime'],$time['endTime'],$time['totalTime']);
            }
            return $list;
        }
    }
?>
