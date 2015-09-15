<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php
if($styl){
    foreach($styl as $style){
?>
    <link rel="stylesheet" href="<?php echo $style; ?>">
<?
    }
}
?>
</head>
<body>

<?php require_once('routes.php'); ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
