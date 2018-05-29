<h3 style="text-align:center">My conferences</h3>
<br>

    
 <div class="card-deck">
        <?php 
        if(count($myconf)==0){
          echo "Ne postoji konf";
      }else{
          foreach ($myconf as $conf){


          
      
      ; ?>
     
     
  <div class="card ">
    
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
   
</div><br/> <div class="d-flex justify-content-center" ><?php echo $links; ?></div>
