<!DOCTYPE html PUBLIC "->
<html>
    <head>
        <title>
<?php
echo (isset($title)?$title:"Timesheet");
?>
        </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php
if(isset($css)){
    foreach($css as $link){
        echo "<link rel=\"stylesheet\" href=\"css/$link.css\">\n";
    }
}
?>
    </head>
