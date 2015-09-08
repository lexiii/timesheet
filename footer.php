<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php
if(isset($js)){
    foreach($js as $link){
        echo "<script src=\"js/$link\"></script>";
    }
}
?>

