<h3 style="text-align:center">My conferences</h3>
<br>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-home-tab"  href="" role="tab" aria-controls="v-pills-home" >Project</a>
            <a class="nav-link" id="v-pills-profile-tab"  href="<?php echo site_url("Admin/addnewConference"); ?>" role="tab" aria-controls="v-pills-profile" >Add new conference</a>
            <a class="nav-link" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviewer invitation</a>
            <a class="nav-link" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerEmailInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviewer Email invitation</a>
        </div>
    </div>
 <div class="card-deck col-9">
        <?php 
        if(count($myconf)==0){
          echo "Ne postoji konf";
      }else{
          foreach ($myconf as $conf){


          
      
      ; ?>
   
  <div class="card col-3">
    
    <img class="card-img-top" src="https://i.pinimg.com/originals/4b/3f/9a/4b3f9ad60ef749b1533623220230727b.jpg" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title"><?php echo $conf['title']; ?> </h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <button type="button" class="btn btn-info">Info</button>
   
  </div>
    
  </div>
     
<?php 
          }
          
          }?>
   
</div>