<div>
<div class="form-group">
        <label for="exampleFormControlInput1">Conference name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Place:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Date of the event:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Date of aplication:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Fields:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placerequired='Dohvati oblast iz baze'>
        
         <div>
            <?php if (!file_exists("image/conferences/conferece_" . $confdata['title'] . ".jpg")) { ?>
                <img class="mr-3" src="<?php echo base_url("image/conferences/conferece_0.jpg"); ?>" alt="Generic placeholder image"/>
            <?php } else {
                ?>
                <img class="mr-3" src="<?php echo base_url("image/conferences/conferece_" . $confdata['title'] . ".jpg"); ?>" width="256" height="256" alt="Generic placeholder image"/>
            <?php } ?>

                    <?php
             echo form_open_multipart("$controller/addingImage","method=post");
            ?>
                <input type="file" name="image" size="20"/><br>
            <?php
            echo form_submit("addimage", "Add image");
            echo form_close();
            ?></div>

        
    </div>
    <button type="button" class="btn btn-success">Create</button>
</div>

