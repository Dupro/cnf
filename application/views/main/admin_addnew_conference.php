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
            <input type="text" class="form-control" id="field" placeholder='Pick field' name="field"> <br>


            <div>
                <!--<label for="files" class="btn btn-info">Select Image</label>-->
                <!--<input id="files" style="visibility:hidden; ili display:none" type="file">-->
                <input id="files"  type="file" name="imageConf" size="20">
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Create">
    </form>
</div>

