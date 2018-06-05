<h3 style="text-align:center">Reviewer invitation</h3>

<div class="row">
    
<form id="adrewinv">
    <div  class="form-group">
    <label for="exampleFormControlSelect2">Users</label>
    <input class="form-control" type="text" name="conferencename" value="<?php echo set_value('conference') ?>"/>
     
    </select>
  </div>
   
   

<form name = "reviewerInvitation" action = "<?php echo site_url('Admin/sendInv') ?>" method = "post">    
    <div class="form-group">
        <label for="usernames">Users</label>
        <select class="form-control" id="usernames" name="usernames">
            <option value="" hidden="">Select Users</option>
            <?php foreach ($users as $username): ?>
                <option value="<?php echo $username['username']; ?>"><?php echo $username['username']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="form-group">
        <div class="row"> 
            <div class="col-sm-12" ><label for="conferenc">Conferences</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select Conference</option>
            <?php foreach ($confdata as $el): ?>
                <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
            <?php endforeach; ?>
            
        </select>
            </div>
      
          
    </div>
    </div>
    
<!--    <div class="form-group">
  <label for="comment">Message:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>

</div>
    <button type="button" class="btn btn-success">Send</button>
</form>

</div>

</div>-->
    <input type="submit" class="btn btn-success" value="Send">
</form>
