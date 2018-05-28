


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Place</th>
            <th scope="col">Start-End Date</th>
            <th scope="col">Application Date</th>
            <th scope="col">Numb</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($myconf as $el) {
            ?>
        
            <tr id="1<?php echo $el['idconference']; ?>" name="idconference" data-toggle="collapse" href="#<?php echo $el['idconference']; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $el['title']; ?>"  value="<?php echo $el['idconference']; ?>">
            <th scope="row"><?php echo $i ;?></th>
             <td><?php echo $el['title']; ?></td>
        <td><?php echo $el['place']; ?></td>
        <td><?php
            $dateb = explode(' ', $el['event_begin']);
            $daten = explode(' ', $el['event_end']);
            echo $dateb[0] . " - " . $daten[0];
            ?></td>
        <td><?php
        $date = explode(' ', $el['application_begin']);
        $dateend = explode(' ', $el['application_end']);
        echo $date[0] . " - " . $dateend[0];
        ?></td>
    </tr>
<!--    <form id="form-id" method="post" action="<?php echo site_url("Admin/projectofconf"); ?>">
<input type="hidden" name="idconference" value="<?php echo $el['idconference']; ?>">
    </form>-->
    <tr class="collapse multi-collapse" id="<?php echo $el['idconference']; ?>"><td colspan="6">  
            <div >

                <div class="card card-body">
                    <table id="tableofproj">
                    </table>
                </div>
            </div>
        <td></tr>

   
<script >
        $(document).ready(function () {
        $('#1<?php echo $el['idconference']; ?>').click(function () {

            var idconference = <?php echo $el['idconference']; ?>;

                $.ajax({
                    url: "<?php echo base_url() ?>Admin/projectofconf",
                    type: "POST",
                    data: {'idconference': idconference},
                    success: function (data) {
                        $('#tableofproj').html(data);
                    },
                    error: function () {
                        alert('Error occur...!!');
                    }
                });
            });
       
    });
</script>
 <?php $i++;
}
?>
</table>