

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">modifier une categorie</h4>
                  <form class="forms-sample" method="post" action="">
                  <?php
                 
                    // execute the query
                    foreach ($cat as $row) {

                    
                  ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Libelle</label>
                      <input type="text" name="libelle" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php echo $row['libelle']?>">
                    </div>
                    <input type="submit" class="btn btn-primary me-2" value="Submit">
                    
                  <?php
                  }
                  ?>
                  </form>
                </div>
              </div>
            </div>
          
               
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       


