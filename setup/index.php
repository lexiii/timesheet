<?php
if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'setup';
}
require_once('views/layout.php');
?>
