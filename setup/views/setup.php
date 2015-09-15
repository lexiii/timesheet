<?php
$errorMsg = "";
    if($er > 0){
        $errorMsg .= '<div class="alert alert-danger" role="alert"><strong>Please fill out all of the fields.</strong><br/>';

        /*
        foreach($msg as $er){
            $errorMsg .= $er."<br/>";
        }
         */
        if($debug)
            var_dump($_POST);
        $errorMsg .= '</div>';
    }
?>
<div class="container-fluid">
    <section class="container card title-card">
<span class='w1'>Time</span><span class='w2'>Sheet</span>
</section>
    <section class="container card ">
        <div class="container-page">
        <?php echo $errorMsg; ?>
<form action="?action=dbSub" method="post">
            <div class="col-md-6">
                <h4>Database </h4>
                <div class="form-group col-lg-12">
                    <label>Host</label>
                    <input type="text" name="DBh" class="form-control" id="" value="localhost">
                </div>

                <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input type="text" name="DBu" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12">
                    <label>Password</label>
                    <input type="password" name="DBp" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12">
                    <label>table:</label>
                    <input type="text" name="DBdb" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-12 text-right">
                    <button type="submit" class="btn btn-primary">Continue</button>
                </div>
            </form>
            </div>

            <div class="col-md-6">
                <h3 class="dark-grey">WELCOME TO TIMESHEET</h3>
                <p>
Put some intro text here. maybe a picture?
                </p>

            </div>
        </div>
    </section>

    <section class="container card ">
<p>Created by Lexi Cross</p>
</section>
</div>
