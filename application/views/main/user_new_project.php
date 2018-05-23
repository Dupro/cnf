
<h3 style="text-align:center">My new project</h3>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form name="createProject" action="<?php echo site_url('User/mynewProject'); ?>" method="POST">
    <div class="form-group">
        <label for="exampleFormControlSelect2">Conferences</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select Conference</option>
            <?php foreach ($confdata as $el): ?>
                <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" >Project name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="project_name" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Key words</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="keywords" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Section</label>
        <select class="form-control" name="field" id="field" disabled="">
            
        </select>
    </div>
    <div class="row">
    <div class="form-group col-5" >
        <label for="exampleFormControlSelect2">Autors</label>
        <select multiple class="form-control" id="autorslist">
            <?php
            if ($autor === "") {
                echo "Nema upisanih konferencija u bazi";
            } else {
                foreach ($autor as $el) {
                    ?>
            <option value="<?php echo $el['first_name'] . " " . $el['last_name']; ?>"><?php echo $el['first_name'] . " " . $el['last_name']; ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div> <div class="col-1"> <button type="button" id="additem" class="btn btn-outline-primary mt-5" onclick="addautor()">ADD</button></div>
    
     <div class="form-group col-5">
        <label for="exampleFormControlSelect2">Autors</label>
        <select multiple class="form-control" id="autorslistselect" name="autor">
            </select>
     </div> 
    <div class="col-1"> <button type="button" class="btn btn-outline-danger mt-5" onclick="deleteautor()">DELETE</button></div>
    
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Abstract</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="apstract"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Send</button>
</form>
<form>
    <div class="form-group">
        <label for="exampleFormControlFile1">Choose file</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
</form>


<script type="text/javascript">
    $(document).ready(function () {
        $('#conferenc').on('change', function () {

            var idconference = $(this).val();

            if (idconference == '')
            {
                $('#field').prop('disabled', true);
            } else
            {
                $('#field').prop('disabled', false);
                $.ajax({
                    url: "<?php echo base_url() ?>User/get_field",
                    type: "POST",
                    data: {'idconference': idconference},
                    success: function (data) {
                        $('#field').html(data);
                    },
                    error: function () {
                        alert('Error occur...!!');
                    }
                });
            }
        });
    });
</script>
<script>
function addautor() {
    var x = document.getElementById("autorslistselect");
    var option = document.createElement("option");
    var y=document.getElementById("autorslist").value;
    option.text =   y;
    x.add(option);
}
</script>
<script>
function deleteautor() {
    var x = document.getElementById("autorslistselect");
    x.remove(x.selectedIndex);
}
</script>
