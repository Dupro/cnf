<div class="container">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name = "loginform" action = "<?php echo site_url('Guest/login_validation') ?>" method = "post">
<?php if (isset($message))
    echo "<font color='red'>$message</font><br>";
?>
    Username:<input type="text" name="username" value="<?php echo set_value('username') ?>"/>
<?php echo form_error("username", "<font color='red'>", "</font>"); ?><br>
    Password:<input type="password" name="password"/>
<?php echo form_error("password", "<font color='red'>", "</font>"); ?><br>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-secondary" value="Log in"/>
      </div></form>
    </div>
  </div>
</div>