
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Utilisateur</h4>
                  <div class="table-responsive pt-3">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prenom
                          </th>
                          <th>
                            E-mail
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Adresse
                          </th>
                          <th>
                            Ville
                          </th>
                          <th>
                            N° Telephone
                          </th>
                          <th>
                            Compte
                          </th>
                          <th>
                            Operation
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php                         
                          foreach ($clients as $row) {
                            ?>

                              <tr class="">
                              <td>
                            <?php echo $row['id_clt'];?>
                          </td>
                          <td>
                            <?php echo $row['nom'];?>
                          </td>
                          <td>
                          <?php echo $row['prenom'];?>
                          </td>
                          <td>
                          <?php echo $row['mail'];?>
                          </td>
                          <td>
                          <img src="./assets/images/faces/<?php echo $row['image'];?>" alt="">
                          </td>
                          <td>
                          <?php echo $row['adress'];?>
                          </td>
                          <td>
                          <?php echo $row['ville'];?>
                          </td>
                          <td>
                          <?php echo $row['tele'];?>
                          </td>
                          <td>
                          <?php if($row['admn']==0)
                              echo 'client';
                              else
                              echo 'admin';
                          ?>
                          </td>
                          <td>
                            <a href="index.php/admin/pages/utilisateur/mod?id=<?php echo $row['id_clt']; ?>" class="btn btn-dark">modifier</a><a href="index.php/admin/pages/utilisateur/del?id=<?php echo $row['id_clt']; ?>" class="btn btn-light">supprimer</a>
                          </td>
                        </tr>

                          <?php
                            }
                        
                        
                        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       