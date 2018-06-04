<div class="form-group">
        <label for="exampleFormControlSelect2">Conferences</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select Conference</option>
            <?php foreach ($confdata as $el): ?>
                <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error("conferenc", "<font color='red'>", "</font>"); ?>
    </div>
<div class="form-group">
        <label for="exampleFormControlSelect2">Conference fields</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select field</option>
            <?php foreach ($confdata as $el): ?>
                <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error("conferenc", "<font color='red'>", "</font>"); ?>
    </div>

<div class="form-group">
        <label for="exampleFormControlSelect2">Conference fields</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select field</option>
            
                <option value="">c=1 Not familliar</option>
                <option value="">c=2 Low knowledge</option>
                <option value="">c=3 General knowledge</option>
                <option value="">c=4 Very good knowledge</option>
                <option value="">c=5 Expert</option>
            
        </select>
        <br>  <br>
        <button class="btn btn-success">SEND</button>
    </div>