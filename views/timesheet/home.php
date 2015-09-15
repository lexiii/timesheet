<?php
$clocked        = isset($latestTime['endTime']);
$inOut          = $clocked?"in":"out";
$sessionString  = ($clocked?"":"Current ")."Session";
$start          = strtotime($latestTime['startTime']);
$startDate      = date("d M Y",$start);
$startTime      = date("h:i A",$start);
$startString    = "<p class='pDate'>".$startDate."</p>".
                "<p class='pTime'>".$startTime."</p>";
if($clocked){
    $end            = strtotime($latestTime['endTime']);
    $endDate        = date("d M Y",$end);
    $endTime        = date("h:i A",$end);
    $endString      = "<p class='pDate'>".$endDate."</p>".
                    "<p class='pTime'>".$endTime."</p>";
}else{
    $end            = "Still Clocked In";
    $endString      = "<p class='stillClocked'>".$end."</p>";
}
?>
<div class='container'>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo $sessionString; ?>
        </h3>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-6 strt title from-title">
                From. . .
            </div>
            <div class="col-md-6 strt from-title">
                To. . .
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 strt">
                <div class='inner'>
                    <?php echo $startString; ?>
                </div>
            </div>
            <div class="col-md-6 strt">
                <div class='inner'>
                    <?php echo $endString; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<a href='<?php echo url_rewrite('timesheet','clock'); ?>' class='btn btn-danger btn-lg'>Clock <?php echo $inOut; ?></a>
<a href='<?php echo url_rewrite('timesheet','view'); ?>' class='btn btn-default pull-right btn-lg'>View records</a>
</div>
