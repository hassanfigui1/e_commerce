
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Produits</h4>
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
                            Prix
                          </th>
                          <th>
                            Date de creation
                          </th>
                          <th>
                            Quantite
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Categorie
                          </th>
                          <th>
                            Operation
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                         
                          foreach($produits as $row) {
                            ?>

                              <tr class="">
                              <td>
                            <?php echo $row['id_prod'];?>
                          </td>
                          <td>
                            <?php echo $row['nom'];?>
                          </td>
                          <td>
                          <?php echo $row['prix'];?>
                          </td>
                          <td>
                          <?php echo $row['date_creation'];?>
                          </td>
                          <td>
                          <?php echo $row['quantite'];?>
                          </td>
                          <td>
                          <img src="./asset_user/images/produits/<?php echo $row['image'];?>" alt="">
                          </td>
                          <td>
                          <?php
                            $lib = get_libelleById($row['id_categorie']);
                            echo $lib['libelle']; 
                          ?>
                          </td>
                          <td>
                          <a href="index.php/admin/pages/produit/mod?id=<?php echo $row['id_prod']; ?>" class="btn btn-dark">modifier</a>
						  <a href="index.php/admin/pages/produit/del?id=<?php echo $row['id_prod']; ?>"class="btn btn-light">supprimer</a>

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
       