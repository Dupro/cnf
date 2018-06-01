
<h3 style="text-align:center">Reviewer invitation</h3>
<div class="row">
    
<form id="adrewinv">
    <div  class="form-group">
    <label for="exampleFormControlSelect2">Users</label>
    <input class="form-control" type="text" name="conferencename" value="<?php echo set_value('conference') ?>"/>
     
    </select>
  </div>
   
   
    <div class="form-group">
        <div class="row"> 
            <div class="col-sm-12" ><label for="exampleFormControlSelect1">Conferences</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>Opcije iz baze</option>
            
        </select>
            </div>
      
          
    </div>
    </div>
    
    <div class="form-group">
  <label for="comment">Mesage:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>
    <button type="button" class="btn btn-success">Send</button>
</form>

</div>
