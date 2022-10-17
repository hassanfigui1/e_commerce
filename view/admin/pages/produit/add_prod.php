
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ajouter un produit</h4>
                  <form class="forms-sample" method="post" action="">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="le nom produit" value="<?php echo $tableau[0]?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Prix</label>
                      <input type="text" name="prix" class="form-control" id="exampleInputName1" placeholder="le prix du produit" value="<?php echo $tableau[1]?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">date_creation</label>
                      <input type="date" name="date" class="form-control" id="exampleInputEmail3" placeholder="la date de creation" value="<?php echo $tableau[2]?>" required>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Quantite</label>
                      <input type="text" name="quantite" class="form-control" id="exampleInputPassword4" placeholder="La quantite" value="<?php echo $tableau[3]?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">categorie</label>
                      <select name="cat">  
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
                    
                  </form>
                </div>
              </div>
            </div>
          
               
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        