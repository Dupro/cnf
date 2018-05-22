<h3 style="text-align:center">My profile</h3>
<h4>Hello: <?php foreach ($mydata as $userdata) {
    echo $userdata['username'];
   ?> </h4><br>
<div class="media"> 

        <div>
            <?php if (!file_exists("image/profile/profile_" . $userdata['iduser'] . ".jpg")) { ?>
                <img class="mr-3" src="<?php echo base_url("image/profile/profile_0.jpg"); ?>" alt="Generic placeholder image"/>
            <?php } else {
                ?>
                <img class="mr-3" src="<?php echo base_url("image/profile/profile_" . $userdata['iduser'] . ".jpg"); ?>" width="256" height="256" alt="Generic placeholder image"/>
            <?php } ?>

                    <?php
             echo form_open_multipart("$controller/addingImage","method=post");
            ?>
                <input type="file" name="image" size="20"/><br>
            <?php
            echo form_submit("addimage", "Add image");
            echo form_close();
            ?></div>

            <div class="media-body">

                <form name = "registration_form" action = "<?php echo site_url('User/myProfile') ?>" method = "post">





                    
                    First name:<input class="form-control" type="text" name="first_name" value="<?php echo $userdata['first_name']; ?>"/>
                                      <?php echo form_error("first_name", "<font color='red'>", "</font>"); ?>
                    Last name:<input class="form-control" type="text" name="last_name" value="<?php echo $userdata['last_name']; ?>"/>
                    <?php echo form_error("last_name", "<font color='red'>", "</font>"); ?>
                    Phone number:<input class="form-control" type="text" name="phone_number" value="<?php echo $userdata['phone_number']; ?>"/>
                    <?php echo form_error("phone_number", "<font color='red'>", "</font>"); ?>
                    Email:<input class="form-control" type="text" name="email" value="<?php echo $userdata['email']; ?>"/>
                    <?php echo form_error("email", "<font color='red'>", "</font>"); ?>
                    Organisation:<input class="form-control" type="text" name="organisation" value="<?php echo $userdata['organisation']; ?>"/>
                    <?php echo form_error("organisation", "<font color='red'>", "</font>"); ?>
                    Date of birth:<input class="form-control" type="date" name="date_of_birth" value="<?php echo $userdata['date_of_birth'];
        } ?>"/>
    <?php echo form_error("date_of_birth", "<font color='red'>", "</font>"); ?>
                    <br>
                    
                <div class="modal-footer">
                    <!-- Button trigger modal -->
                    <?php echo "<font color='blue'>".$successPW."</font>"; ?>
                    <a class="btn btn-primary" href="<?php echo site_url('ControllerChangePassword'); ?>">Change your password</a>

                    <!-- Modal -->
                    <div class="modal fade" id="changePasssword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Password change</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo form_open("User/changePwd", "method=post");
                                    echo validation_errors();
                                    ?>
                                    Old password:<input class="form-control" type="password" name="opassword"/>
                                    <?php echo form_error("password", "<font color='red'>", "</font>"); ?>
                                    New password:<input class="form-control" type="password" name="npassword"/>
                                    <?php echo form_error("password", "<font color='red'>", "</font>"); ?>
                                    Re-enter password:<input class="form-control" type="password" name="cpassword"/>
                                    <?php echo form_error("password", "<font color='red'>", "</font>"); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save changes">
                                    <?php
                                    echo form_close();
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>





                <input type="submit" class="btn btn-secondary" value="Edit"/>

            </div></form>    

    </div>
</div>