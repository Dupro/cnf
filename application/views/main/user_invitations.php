<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <?php    echo form_open_multipart("User/sendCompetence", array('method' => 'POST',
                                                            'onsubmit' => 'return selectALL()')); ?>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Your conference invitations:</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select Conference</option>
            <?php foreach ($confdata as $el): ?>
                <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error("conferenc", "<font color='red'>", "</font>"); ?>
    </div>
<div class="form-group">
        <label for="exampleFormControlSelect1">Section</label>
        <select class="form-control" name="field" id="field" disabled="" >
            <option value="" hidden="" >Select Conference to open Section</option>
            
        </select>
        <?php echo form_error("field", "<font color='red'>", "</font>"); ?>
    </div>
    <div class="form-group">
        <?php $i=1;
        foreach ($field as $fld): ?>
        Field: <?php echo $fld['field_name']; ?><br>
        Competencies:<br>
        <input type="radio" id="Not_familiar<?php echo $i;?>" name="competence" value="<?php echo 1;?>"><label for="Not_familiar<?php echo $i;?>"> Not familliar</label>
        <input type="radio" id="Low_knowledge<?php echo $i;?>" name="competence" value="<?php echo 2;?>"><label for="Low_knowledge<?php echo $i;?>"> Low knowledge</label>
        <input type="radio" id="General_knowledge<?php echo $i;?>" name="competence" value="<?php echo 3;?>"><label for="General_knowledge<?php echo $i;?>"> General knowledge</label>
        <input type="radio" id="Very_good_knowledge<?php echo $i;?>" name="competence" value="<?php echo 4;?>"><label for="Very_good_knowledge<?php echo $i;?>"> Very good knowledge</label>
        <input type="radio" id="Expert<?php echo $i;?>" name="competence" value="<?php echo 5;?>"><label for="Expert<?php echo $i;?>"> Expert</label>
        <?php echo form_error("field", "<font color='red'>", "</font>"); ?><br>
        <?php  $i++; 
        endforeach; ?>
    </div>
                <input type="radio" id="Not_familiar" name="competence" value="<?php echo 1;?>"><label for="Not_familiar"> Not familliar</label>
        <input type="radio" id="Low_knowledge" name="competence" value="<?php echo 2;?>"><label for="Low_knowledge"> Low knowledge</label>
        <input type="radio" id="General_knowledge" name="competence" value="<?php echo 3;?>"><label for="General_knowledge"> General knowledge</label>
        <input type="radio" id="Very_good_knowledge" name="competence" value="<?php echo 4;?>"><label for="Very_good_knowledge"> Very good knowledge</label>
        <input type="radio" id="Expert" name="competence" value="<?php echo 5;?>"><label for="Expert"> Expert</label>
<div class="form-group">
        <button class="btn btn-success">SEND</button>
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