<h3 style="text-align:center">My conferences</h3>
<br>
<div class="card-deck ">
   <div class="row " > 
 

    <?php
//   echo $carton;

    if ($confdatapag === "") {
        echo "Nema upisanih konferencija u bazi";
    } else {
        foreach ($confdatapag as $el) {
            ?>
       <div class="col-sm-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="https://i.pinimg.com/originals/4b/3f/9a/4b3f9ad60ef749b1533623220230727b.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $el['title']; ?></h5>
                    <p class="card-text"><?php echo $el['place']; ?></p>
                    <p class="card-text"><?php echo $el['event_begin']; ?><br/><?php echo $el['event_end']; ?></p>


                    <a href="<?php echo site_url("$controller/dataconf/" . $el['idconference']); ?>" class="btn btn-info " tabindex="-1" role="button" aria-disabled="true">Info</a>
                </div>
            </div></div>
            <?php
        }
    }
    ?>
</div>
</div><br/> <div class="d-flex justify-content-center" ><?php echo $links; ?></div>
    </div>
     
