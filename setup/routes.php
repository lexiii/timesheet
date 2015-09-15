<?php
    function call($action) {
        require_once('setup_controller.php');
        require_once('setup_model.php');

        $controller = new SetupController();

        $controller->{ $action }();
    }
$actions = ['setup','dbSub','error','make','user','userSub'];
if(in_array($action,$actions)){
    call($action);
}else{
    call('error');
}
?>
