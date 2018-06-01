



<div id="main" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" id="carosel">
            <img class="d-block h-50 w-100" src="https://www.iaspaper.net/wp-content/uploads/2015/06/International-conferences-on-United-NationsIndia-Indian-Ocean.png" alt="First slide">
            <div class="carousel-caption">
                <button type="button" href="<?php echo site_url("Guest/dataconf/1"); ?>" class="btn btn-success">More details</button>

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block h-50 w-100" src="https://mybroadband.co.za/news/wp-content/uploads/2017/08/MyBroadband-Underground.jpg" alt="Second slide">
            <div class="carousel-caption">
               <button type="button" href="<?php echo site_url("Guest/dataconf/1"); ?>" class="btn btn-success">More details</button>

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block h-50 w-100" src="https://s3.amazonaws.com/rdcms-hsmai/files/production/public/images/ROCroom17.jpg" alt="Third slide">
            <div class="carousel-caption">
                <button type="button" href="<?php echo site_url("Guest/dataconf/1"); ?>" class="btn btn-success">More details</button>

            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><br>


<div class="card-deck">

    <?php
//   echo $carton;

    if ($confdatapag === "") {
        echo "Nema upisanih konferencija u bazi";
    } else {
        foreach ($confdatapag as $el) {
            ?>
            <div class="card">
                <img class="card-img-top" src="https://i.pinimg.com/originals/4b/3f/9a/4b3f9ad60ef749b1533623220230727b.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $el['title']; ?></h5>
                    <p class="card-text"><?php echo $el['place']; ?></p>
                    <p class="card-text"><?php echo $el['event_begin']; ?><br/><?php echo $el['event_end']; ?></p>


                    <a href="<?php echo site_url("$controller/dataconf/" . $el['idconference']); ?>" class="btn btn-info " tabindex="-1" role="button" aria-disabled="true">Info</a>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div><br/> <div class="d-flex justify-content-center" ><?php echo $links; ?></div>

