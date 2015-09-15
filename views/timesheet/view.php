<?php
// MOVE THIS!
date_default_timezone_set('Australia/Sydney');
$res = " ";
foreach($times as $time){
        $startTime = strtotime($time->startTime);
        $startTime = date("m/d/Y",$startTime)."<br/>".date("H:i",$startTime);
        if(isset($time->endTime)){
            $endTime = strtotime($time->endTime);
            $endTime = date("m/d/Y",$endTime)."<br/>".date("H:i",$endTime);
        }else{
            $endTime = "STILL CLOCKED IN";
        }
        $res.="<tr>".
            "<td>".
            $startTime.
            "</td>".
            "<td>".
            "<p>- to -</p>".
            "</td>".
            "<td>".
            $endTime.
            "</td>".
            "</tr>";
}
?>
<div class='container'>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <table class='table table-hover'>
        <thead>
            <tr>
            <th> Start Time </th>
            <th></th>
            <th> End Time </th>
            </tr>
        </thead>
        <tbody>
        <?php echo $res; ?>
        </tbody>
    </table>
<div>
</div>
</div>
</div>
<div>
<div class='text-center'>
<a href='/' class='btn btn-default btn-lg'>Back</a>
</div>
</div>
</div>
