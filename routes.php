<?php
    function call($controller, $action) {
        require_once('controllers/'. $controller .'_controller.php');

        switch($controller){
            case 'timesheet':
                require_once('models/timesheet.php');
                $controller = new TimesheetController();
                break;
            case 'login':
                $controller = new LoginController();
                break;
        }

        $controller->{ $action }();
    }
$controllers = array(   'timesheet'=>['home', 'view','clock', 'error'],
                        'login'=>['home','register','logout','error']);
if(array_key_exists($controller,$controllers)){
    if(in_array($action,$controllers[$controller])){
        call($controller,$action);
    }else{
        call($controller,'error');
    }
}else{
    call('timesheet','error');
}
?>
