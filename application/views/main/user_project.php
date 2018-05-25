<h3 style="text-align:center">Projects</h3>
<div class="form-group">

           <div class="form-group">
    <label for="exampleFormControlSelect2">Project name:</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
        <?php foreach ($project_data as $val) { ?>
        <option value="<?php echo $val['idproject']; ?>"> <?php echo $val["project_name"]."  ".$val['title'] ?></option>
 <?php } ?>
    </select>
  </div><br>
            
            <div  ><label for="exampleFormControlSelect1">Reviews comments:</label>
                <input type="text" name="reviewcomments" class="form-control">
                
            </div>
          
    
    </div>
<button type="button" class="btn btn-primary">Edit</button>
<button type="button" class="btn btn-danger">Delete</button>

