
<h3 style="text-align:center">Reviewer invitation</h3>
<form>
    <div class="form-group">
    <label for="exampleFormControlSelect2">Reviewer</label>
    <input class="form-control" type="text" name="conferencename" value="<?php echo set_value('conference') ?>"/>
     
    </select>
  </div>
   
   
    <div class="form-group">
        <div class="row"> 
            <div class="col-sm-8" ><label for="exampleFormControlSelect1">Field</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>Opcije iz baze</option>
            
        </select>
            </div>
          <div class="col-sm-4" > <label for="exampleFormControlSelect1">My competences</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>k=1</option>
            <option>k=2</option>
            <option>k=3</option>
            <option>k=4</option>
            <option>k=5</option>
        </select></div>
    </div>
    </div>
    
</form>
<button type="button" class="btn btn-success">Send</button>