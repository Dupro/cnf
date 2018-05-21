


<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-home-tab"  href="" role="tab" aria-controls="v-pills-home" >Project</a>
            <a class="nav-link" id="v-pills-profile-tab"  href="<?php echo site_url("Admin/addnewConference"); ?>" role="tab" aria-controls="v-pills-profile" >Add new conference</a>
            <a class="nav-link" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Rewier invitation</a>
        </div>
    </div>
    <div class="col-9">
        <div class="card-deck">

            <?php
            if ($confdata === NULL) {
                echo "Nema upisanih konferencija u bazi";
            } else {
                foreach ($confdata as $el) {
                    ?>
                    <div class="card">
                        <img class="card-img-top" src="https://i.pinimg.com/originals/4b/3f/9a/4b3f9ad60ef749b1533623220230727b.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $el['title']; ?></h5>
                            <p class="card-text"><?php echo $el['place']; ?></p>
                            <p class="card-text"><?php echo $el['begin']; ?><br/><?php echo $el['end']; ?></p>
                            <button type="button" class="btn btn-info">Info</button>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
    </div>
</div>
