Register:<br><br>
<form name = "registration_form" action = "<?php echo site_url('Guest/registration_validation') ?>" method = "post">
<?php if (isset($message))
    echo "<font color='red'>$message</font><br>";
?>
    Username:<input type="text" name="username" value="<?php echo set_value('username') ?>"/>
<?php echo form_error("username", "<font color='red'>", "</font>"); ?><br>
    Password:<input type="password" name="password"/>
<?php echo form_error("password", "<font color='red'>", "</font>"); ?><br>
Confirm your Password:<input type="password" name="password"/>
<?php echo form_error("password", "<font color='red'>", "</font>"); ?><br>
First name:<input type="text" name="first_name" value="<?php echo set_value('first_name') ?>"/>
<?php echo form_error("first_name", "<font color='red'>", "</font>"); ?><br>
Last name:<input type="text" name="last_name" value="<?php echo set_value('last_name') ?>"/>
<?php echo form_error("last_name", "<font color='red'>", "</font>"); ?><br>
Phone number:<input type="text" name="phone_number" value="<?php echo set_value('phone_number') ?>"/>
<?php echo form_error("phone_number", "<font color='red'>", "</font>"); ?><br>
Email:<input type="text" name="email" value="<?php echo set_value('email') ?>"/>
<?php echo form_error("email", "<font color='red'>", "</font>"); ?><br>
Organisation:<input type="text" name="organisation" value="<?php echo set_value('organisation') ?>"/>
<?php echo form_error("organisation", "<font color='red'>", "</font>"); ?><br>
Date of birth:<input type="date" name="date_of_birth" value="<?php echo set_value('date_of_birth') ?>"/>
<?php echo form_error("date_of_birth", "<font color='red'>", "</font>"); ?><br>
    <input type="submit" value="Register"/>
</form>
