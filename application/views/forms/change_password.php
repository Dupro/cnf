<form name = "changePW" action = "<?php echo site_url('ControllerChangePassword/changePW') ?>" method = "post">
    <?php
    if (isset($message)) {
        echo "<font color='red'>$message</font><br>";
    }
    ?>
    Old password:<input class="form-control" type="password" name="opassword"/>
    <?php echo form_error("opassword", "<font color='red'>", "</font>"); ?>
    New password:<input class="form-control" type="password" name="npassword"/>
    <?php echo form_error("npassword", "<font color='red'>", "</font>"); ?>
    Re-enter password:<input class="form-control" type="password" name="cpassword"/>
    <?php echo form_error("cpassword", "<font color='red'>", "</font>"); ?>
    <input type="submit" class="btn btn-primary" value="Save changes">
    <?php
    echo form_close();
    ?>