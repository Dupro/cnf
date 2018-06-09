
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="alert alert-dark " >
    <input id="thisconfid" name="prodId" type="hidden" value="<?php echo $idconfeee; ?>">

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

                        <div class="col-4"> <h3>Co-authors:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php
                                foreach ($coautor as $co) {
                                    echo $co["first_name"] . " " . $co['last_name'] . " ";
                                    ?> <?php } ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Key words:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["keywords"]; ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Fields:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["section_pro"]; ?></h5></div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-right mt-3">
                <div class="row">
                    <a class="btn btn-info mr-3"  data-toggle="collapse" href="#aboutneki" role="button" aria-expanded="false" aria-controls="#aboutneki">
                        ABSTRACT
                    </a>
                    <button type="button" class="btn btn-warning"> Download File!!!</button></div>
                <div class="row mt-2"><?php
                    $backgroundcolor = "";
                    $text = "";
                    foreach ($projinfo as $el) {
                        $status = $el["status"];
                        if ($status == 0) {
                            $backgroundcolor = "#97bbf4";
                            $text = "new project";
                        } elseif ($status == 1) {
                            $backgroundcolor = "#c7ffb5";
                            $text = "project in conference";
                        } elseif ($status == 2) {
                            $backgroundcolor = "#fdffba";
                            $text = "at reviewers";
                        } elseif ($status == 3) {
                            $backgroundcolor = "#ffebbc";
                            $text = "finished review";
                        } else {
                            $backgroundcolor = "#d2afff";
                            $text = "returned author";
                        }
                    }
                    ?>
                    <div class="col-12 "><h5 style="text-align: left; background-color: <?php echo $backgroundcolor; ?> " >Status: <?php echo $text; ?> </h5></div>

                    <div class="col-12 "><h5 style="text-align: left;">Ocena: <?php echo $el["section_pro"]; ?></h5></div>
                    <!--Ovde treba ocena i satus-->
                </div>
                <div class="row mt-2">
                    <div class="col-12" style="text-align: right;">
                        <form method="post" action="<?php echo site_url("Admin/alowprojinconf"); ?>">
                            <input  name="idprojforadd" hidden="" value="<?php
                            foreach ($projinfo as $el) {
                                echo $el['idproject'];
                            }
                            ?>">
                            <input  name="prodId" type="submit" class="btn btn-outline-success" value="Put in conference" >
                        </form>
                    </div>
                </div>
            </div></div>
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
        <div class="col-4"><h4>Reviewer options:</h4></div>
        <div class="col-1"></div>
        <div class="col-6"><table class="table"><thead> <tr>
                        <?php foreach ($fieldpi as $fi) { ?>
                            <th scope="col"><?php echo $fi['name_field']; ?></th> <?php } ?>
                    </tr>
                </thead></table>
        </div>
    </div>
    <form id="reviewerdata" method="post" action="<?php echo site_url("Admin/send_to_rewiers"); ?>">
        <div class="row mt-2">
            <div class="col-2">
                <h4>Chose revisor 1:</h4>
            </div>

            <div class="col-3">
                <div class="input-group">
                    <select class="custom-select" id="inputGroup1" name="rewuer1" required="">
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
                    <select class="custom-select" id="inputGroup2" name="rewuer2"required="">
                        <option value="0" hidden="">Choose reviewer</option>
                        <?php foreach ($rew as $reww) { ?>
                            <option value="<?php echo $reww['idreviewer'] ?>"><?php echo $reww['first_name'] . " " . $reww['last_name']; ?>
                            </option><?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-6" id="listofreviewercompetence2"></div>
        </div>
        <div class="row mt-4">
            <div class="col-2"><h4>Date to finish:</h4> </div>
            <div class="col-3">
                <input class="form-control" type="date" name="date_of_birth" value="" required=""/></div>
            <div class="col-2" hidden="" > <input  name="idprojforsend" type="hidden" value="<?php
                foreach ($projinfo as $el)
                    echo $el['idproject'];
                ?>">

            </div>
        </div>
    </form>
</div>
<div class="alert alert-dark " >
    <div class="row mt-2">
        <div class="col-2">
            <form method="post" action="<?php echo site_url("Admin/delete_from_conf"); ?>">
                <input  name="idprojfordelete" hidden="" value="<?php
                foreach ($projinfo as $el) {
                    echo $el['idproject'];
                }
                ?>">
                <input  name="prodId" type="submit" class="btn btn-danger" value="Delete project" >
            </form></div>
        <div class="col-6"></div>
        <div class="col-2">
            <form method="post" action="<?php echo site_url("Admin/return_to_author"); ?>">
                <input  name="idprojforreturn" type="hidden" value="<?php
                foreach ($projinfo as $el)
                    echo $el['idproject'];
                ?>">
                <input  name="prodId" type="submit" class="btn btn-secondary" value="Return to Author" >
            </form>
        </div>
        <div class="col-2">
            <label for="prodIdsuc">
                <input  name="prodId" type="submit" class="btn btn-success" value="Send to Reviewers" form="reviewerdata">
            </label></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#inputGroup1').on('change', function() {

            var idreviewer = $(this).val();
            var idconf = document.getElementById("thisconfid").value;

            $.ajax({
                url: "<?php echo base_url() ?>Admin/get_competence",
                type: "POST",
                data: {'idreviewer': idreviewer, 'idconf': idconf},

                success: function(data) {
                    $('#listofreviewercompetence1').html(data);
                },
                error: function() {
                    alert('Error occur...!!');
                }
            });

        });
    });
    $(document).ready(function() {
        $('#inputGroup2').on('change', function() {

            var idreviewer = $(this).val();
            var idconf = document.getElementById("thisconfid").value;
            $.ajax({
                url: "<?php echo base_url() ?>Admin/get_competence",
                type: "POST",
                data: {'idreviewer': idreviewer, 'idconf': idconf},
                success: function(data) {
                    $('#listofreviewercompetence2').html(data);
                },
                error: function() {
                    alert('Error occur...!!');
                }
            });

        });
    });

    $('#inputGroup1').change(function(e) {
        if ($(this).val() == "") {
            alert('hi');
            $("#inputGroup2 option[value='']").prop('disabled', true);
        } else
            $("#inputGroup2 option[value='']").prop('disabled', false);
    });
//    function redyy() {
//        document.getElementById("prodIdsuc").innerHTML = TRUE;
//    }
</script>