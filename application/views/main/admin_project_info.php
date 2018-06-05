
<div class="alert alert-dark " >
   <div class="row">
       <div class="col-8" > 
    <?php foreach ($projinfo as $el) {?>
           <div class="container">
           <div class="row">
               <div class="col-4"> <h3>Title:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["project_name"];?></h5></div>
           </div>
          <div class="row">
               <div class="col-4"> <h3>Author:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["first_name"]." ".$el['last_name'];?></h5></div>
           </div>
            <div class="row">
                
               <div class="col-4"> <h3>Co-authors:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php foreach ($coautor as $co) {    echo $co["first_name"]." ".$co['last_name']." "; ?> <?php }?></h5></div>
           </div>
           <div class="row">
               <div class="col-4"> <h3>Key words:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["keywords"];?></h5></div>
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
        <div class="col-4">
            <h4>Chose revisor 1:</h4>
        </div>
        <div class="col-8">
            
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-4">
            <h4>Chose revisor 2:</h4>
        </div>
        <div class="col-8">   
            <select >
                <option></option>
            </select>
        </div>
    </div>
</div>