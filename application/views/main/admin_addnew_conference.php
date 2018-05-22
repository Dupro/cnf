<div> <form name="createConference" action="<?php echo site_url('Admin/createConference'); ?>" method="POST" >
<div class="form-group">

        <label for="conferenceName">Conference name:</label>
        <input type="text" class="form-control" id="conferenceName"  name="title" >
    </div>
    <div class="form-group">
        <label for="place">Place:</label>
        <input type="text" class="form-control" id="place" name="place">
    </div>
    <div class="form-group">
        <label for="eventBegin">Event begin:</label>
        <input type="datetime-local" class="form-control" id="eventBegin" name="event_begin">
    </div>
    <div class="form-group">
        <label for="eventEnd">Event end:</label>
        <input type="datetime-local" class="form-control" id="eventEnd" name="event_end">
    </div>
    <div class="form-group">
        <label for="aplicationBegin">Application begin:</label>
        <input type="datetime-local" class="form-control" id="applicationBegin" name="application_begin">
    </div>
    <div class="form-group">
        <label for="aplicationEnd">Application end:</label>
        <input type="datetime-local" class="form-control" id="applicationEnd" name="application_end">
    </div>
    <div class="form-group">
        <label for="projectsPerAutor">Projects per autor:</label>
        <input type="number" class="form-control" id="projectsPerAutor" name="projects_per_autor">
    </div>
    <div class="form-group">
        <label for="field">Field:</label>
        <input type="text" class="form-control" id="field" placeholder='Pick field' name="field">
        
        
        <!--Tek treba odraditi dodavanje. Malo je komplikovanije nego sto izgleda.-->
            <?php // if (!file_exists("image/conferences/conference_" . $confdata['title'] . ".jpg")) { ?>
                <!--<img class="mr-3 confImg" src="<?php // echo base_url("image/conference/conference_0.jpg"); ?>" alt="Generic placeholder image"/>-->
            <?php // } else {
//                ?>
                <!--<img class="mr-3" src="<?php // echo base_url("image/conferences/conferece_" . $confdata['title'] . ".jpg"); ?>" width="256" height="256" alt="Generic placeholder image"/>-->
            <?php // } ?>

                    <?php
//             echo form_open_multipart("$controller/addingImage","method=post");
            ?>
                <!--<input type="file" name="image" size="20"/><br>-->
            <?php
//            echo form_submit("addimage", "Add image");
//            echo form_close();
//            ?>

        
    </div>
    <input type="submit" class="btn btn-success" value="Create">
    </form>
</div>

