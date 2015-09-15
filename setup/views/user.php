<?php
$errorMsg = "";
    if($db['errors'] > 0){
        $errorMsg .= '<div class="alert alert-danger" role="alert"><strong>Please fill out all of the fields.</strong><br/>';

        foreach($db['errorMsg'] as $er){
            $errorMsg .= $er."<br/>";
        }
        if($debug)
            var_dump($_POST);
        $errorMsg .= '</div>';
    }
$dat = $db['data'];
?>
<div class="container-fluid">
    <section class="container card title-card">
<span class='w1'>Time</span><span class='w2'>Sheet</span>
</section>
    <section class="container card ">
        <div class="container-page">
        <?php echo $errorMsg; ?>
<form action="?action=userSub" method="post">
            <div class="col-md-6">

                <h4 class="dark-grey">Admin User</h3>
                <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input type="text" name="Username" class="form-control" id="" value="<?php echo $dat['Username']; ?>">
                </div>

                <div class="form-group col-lg-12">
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control" id="" value="<?php echo $dat['email']; ?>">
                </div>

                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input type="password" name="pass1" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Repeat Password</label>
                    <input type="password" name="pass2" class="form-control" id="" value="">
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
