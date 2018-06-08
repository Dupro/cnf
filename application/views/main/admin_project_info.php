
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="alert alert-dark " >
    <input id="thisconfid" name="prodId" type="hidden" value="<?php echo $idconfeee;?>">
    
    <div class="row">
        <div class="col-8" > 
            <?php foreach ($projinfo as $el) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-4"> <h3>Title:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["project_name"]; ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Author:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["first_name"] . " " . $el['last_name']; ?></h5></div>
                    </div>
                    <div class="row">

                        <div class="col-4"> <h3>Co-authors:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php foreach ($coautor as $co) {
                echo $co["first_name"] . " " . $co['last_name'] . " "; ?> <?php } ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Key words:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["keywords"]; ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Fields:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["section_pro"]; ?></h5></div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-right mt-5">
                <a class="btn btn-info mr-3"  data-toggle="collapse" href="#aboutneki" role="button" aria-expanded="false" aria-controls="#aboutneki">
                    ABSTRACT
                </a>
                <button type="button" class="btn btn-warning"> Download File!!!</button></div></div>
        <div class="row">
            <div class="collapse col-12 mt-2" id="aboutneki">
                <div class="card card-body">
                    <?php
                    echo $el['apstract'];
                }
                ?>
            </div>
        </div></div>
</div>
<div class="alert alert-dark " >
    <div class="row mt-2">
        <div class="col-2"></div>
        <div class="col-3"></div>
        <div class="col-6"><table class="table"><thead> <tr>
<?php foreach ($fieldpi as $fi) { ?> 
                            <th scope="col"><?php echo $fi['name_field']; ?></th> <?php } ?>

                    </tr>
                </thead></table>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-2">
            <h4>Chose revisor 1:</h4>
        </div>
        <div class="col-3">
            <div class="input-group">
                <select class="custom-select" id="inputGroup1">
                     <option value="0" hidden="">Choose reviewer</option>
                    <?php foreach ($rew as $reww) { ?>
                        <option value="<?php echo $reww['idreviewer'] ?>"><?php echo $reww['first_name'] . " " . $reww['last_name'] ?></option><?php } ?>
                </select>
            </div>
        </div>
        <div class="col-6" id="listofreviewercompetence1"></div>
    </div>
    <div class="row mt-4">
        <div class="col-2">
            <h4>Chose revisor 2:</h4>
        </div>
        <div class="col-3">
            <div class="input-group">
                <select class="custom-select" id="inputGroup2">
                    <option value="0" hidden="">Choose reviewer</option>
                    <?php foreach ($rew as $reww) { ?>
                        <option value="<?php echo $reww['idreviewer'] ?>"><?php echo $reww['first_name'] . " " . $reww['last_name']; ?>
                        </option><?php } ?>
                </select>
            </div>
        </div>
        <div class="col-6" id="listofreviewercompetence2"></div>
    </div>
</div>
<script>
   $(document).ready(function () {
        $('#inputGroup1').on('change', function () {
            
            var idreviewer = $(this).val();
             var idconf = document.getElementById("thisconfid").value;
            
                $.ajax({
                    url: "<?php echo base_url() ?>Admin/get_competence",
                    type: "POST",
                    data: {'idreviewer': idreviewer, 'idconf':idconf},
                   
                   
                    success: function (data) {
                        $('#listofreviewercompetence1').html(data);
                    },
                    error: function () {
                        alert('Error occur...!!');
                    }
                });
            
        });
    });
    $(document).ready(function () {
        $('#inputGroup2').on('change', function () {

            var idreviewer = $(this).val();
            var idconf = document.getElementById("thisconfid").value;
                $.ajax({
                    url: "<?php echo base_url() ?>Admin/get_competence",
                    type: "POST",
                    data: {'idreviewer': idreviewer, 'idconf':idconf},
                    success: function (data) {
                        $('#listofreviewercompetence2').html(data);
                    },
                    error: function () {
                        alert('Error occur...!!');
                    }
                });
            
        });
    });
</script>