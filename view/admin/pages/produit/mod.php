


 
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">modifier un utilisateur</h4>
                  <form class="forms-sample" method="post" action="">
                  <?php
                  

                    // execute the query

                    foreach ($prod as $row) {

                    
                  ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php echo $row['nom'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">prix</label>
                      <input type="text" name="prix" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php echo $row['prix'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">date</label>
                      <input type="date" name="date" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $row['date_creation'];?>" required>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image" required>
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">quantite</label>
                      <input type="text" name="quantite" class="form-control" id="exampleInputCity1" placeholder="Location" value="<?php echo $row['quantite'];?>" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">categorie</label>
                      <select name="cat" >  
                      <?php
                           
                          foreach($libelles as $row){
                        ?>
                      <option value = "<?php echo $row['libelle'] ;?>"><?php echo $row['libelle'] ;?></option>  
                      <?php
                        }
                        ?>
          
                       </select>   
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
       




