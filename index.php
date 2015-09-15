<?php
// CHANGE THIS TO 1 IF YOU DO NOT HAVE MOD_REWRITE ENABLED ON YOUR SERVER
DEFINE("REWRITEMODE",0);

session_start();
require_once('config.php');
if(!isset($SQLHost)){
header( 'Location: /setup/index.php' ) ;
    die();
}
require_once('connection.php');
require_once('views/styles.php');
require_once('functions/urlWriter.php');

$logged = isset($_SESSION['username']);
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action']==""?'home':$_GET['action'];
}else{
    $controller = 'timesheet';
    $action     = 'home';
}

$layout_page = 'views/layout_logged.php';

if(!$logged){
    $controller     = 'login';
    $layout_page    = 'views/layout.php';
}

if(array_key_exists($controller,$styles)){
    $styl = $styles[$controller];
}else{
    $styl = NULL;
}

require_once($layout_page);
?>

