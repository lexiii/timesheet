<?php
    class TimesheetController{
        public function home(){
            $latestTime = Timesheet::latest();
            require_once('views/timesheet/home.php');
        }
        public function view(){
            $times = Timesheet::all();
            require_once('views/timesheet/view.php');
        }
        public function clock(){
            $latestTime = Timesheet::latest();
            $times = Timesheet::clock($latestTime);
            $latestTime = Timesheet::latest();
            require_once('views/timesheet/clock.php');
        }
        public function error(){
            require_once('views/timesheet/error.php');
        }
    }
?>
