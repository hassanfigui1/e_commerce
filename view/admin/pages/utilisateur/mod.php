

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

                    foreach($clt as $row) {

                    
                  ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php echo $row['nom']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php echo $row['prenom']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">E-mail</label>
                      <input type="mail" name="mail" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $row['mail']?>" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="image" placeholder="Upload Image" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Ville</label>
                      <input type="text" name="ville" class="form-control" id="exampleInputCity1" placeholder="Location" value="<?php echo $row['ville']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tele</label>
                      <input type="text" name="tele" class="form-control" id="exampleInputCity1" placeholder="Location" value="<?php echo $row['tele']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Adresse</label>
                      <input type="text" name="adress" class="form-control" id="exampleTextarea1" rows="4" value="<?php echo $row['adress']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Role</label>
                      <select name="role" >  
                      <option value = "client"  selected>client</option>  
                      <option value = "admin" >admin</option>  
          
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
        