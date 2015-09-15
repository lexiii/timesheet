<?php
$manual =
        '$host = "'.$db['DBh']."\";\n".
        '$username = "'.$db['DBu']."\";\n".
        '$password = "'.$db['DBp']."\";\n".
        '$db_name = "'.$db['DBdb']."\";\n".
        "\n".
        'DEFINE("SQLHost",$SQLHost)'.";\n".
        'DEFINE("SQLUsername",$SQLUsername)'.";\n".
        'DEFINE("SQLPassword",$SQLPassword)'.";\n".
        'DEFINE("SQLDB",$SQLDB)'.";\n";
?>
<div class='container'>
<h1>Config file is not writable</h1>
<p>Copy the text below to config.php and then continue </p>
<pre>
&lt;?php
<?php echo $manual; ?>
?&gt;
</pre>
<a class='btn btn-primary btn-lrg' href='/setup/?action=user'>Continue</a>
</div>
