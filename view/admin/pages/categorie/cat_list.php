
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">categories</h4>
                  <div class="table-responsive pt-3">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            libelle
                          </th>
                          <th>
                            Operation
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    
                          foreach($categories as $row) {
                            ?>

                              <tr class="">
                              <td>
                            <?php echo $row['id_categorie'];?>
                          </td>
                          <td>
                            <?php echo $row['libelle'];?>
                          </td>
                         
                          <td>
                          <a  class="btn btn-dark" href="index.php/admin/pages/categorie/mod?id=<?php echo $row['id_categorie']; ?>">modifier list</a>&nbsp&nbsp&nbsp&nbsp
                          <a class="btn btn-light" href="index.php/admin/pages/categorie/del?id=<?php echo $row['id_categorie']; ?>">supprimer</a>
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
        