
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ajouter un utilisateur</h4>
                  <form class="forms-sample" method="post" action="">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Name"  value="<?php echo $tableau[0];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php echo $tableau[1];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">E-mail</label>
                      <input type="mail" name="mail" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $tableau[2];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password" value="<?php echo $tableau[3];?>" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Ville</label>
                      <input type="text" name="ville" class="form-control" id="exampleInputCity1" placeholder="Location" value="<?php echo $tableau[4];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tele</label>
                      <input type="text" name="tele" class="form-control" id="exampleInputCity1" placeholder="Location" value="<?php echo $tableau[5];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Adresse</label>
                      <input type="text" name="adress" class="form-control" id="exampleTextarea1" rows="4" value="<?php echo $tableau[6];?>"required>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Role</label>
                      <select name="role">  
                      <option value = "client" selected>client</option>  
                      <option value = "admin" >admin</option>  
          
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
       