
<h3 style="text-align:center">My new project</h3>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form>
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
        <label for="exampleFormControlInput1">Project name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Key words</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Section</label>
        <select class="form-control" name="field" id="field" disabled="">
            
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Autors</label>
        <select multiple class="form-control" id="exampleFormControlSelect2">
            <?php
            if ($autor === "") {
                echo "Nema upisanih konferencija u bazi";
            } else {
                foreach ($autor as $el) {
                    ?>
                    <option><?php echo $el['first_name'] . " " . $el['last_name']; ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Abstract</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
</form>
<form>
    <div class="form-group">
        <label for="exampleFormControlFile1">Choose file</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
</form>
<button type="button" class="btn btn-success">Send</button>

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