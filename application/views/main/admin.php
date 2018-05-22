
<?php echo "<font color='blue'>".$successAddConf."</font>"; ?>

<div class="row">
  
    <div class="col-12">
        <div class="card-deck">

            <?php
            if ($confdata === NULL) {
                echo "Nema upisanih konferencija u bazi";
            } else {
                foreach ($confdata as $el) {
                    ?>
            <div class="col-sm-3 mb-4" >
                    <div class="card">
                        <img class="card-img-top" src="https://i.pinimg.com/originals/4b/3f/9a/4b3f9ad60ef749b1533623220230727b.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $el['title']; ?></h5>
                            <p class="card-text"><?php echo $el['place']; ?></p>
                            <p class="card-text">Event begin: <?php echo $el['event_begin']; ?><br/>Event end: <?php echo $el['event_end']; ?></p>
                            <button type="button" class="btn btn-info">Info</button>
                        </div>
                    </div>
                </div>
                    <?php
                }
            }
            ?>

        </div>
    </div>
</div>
