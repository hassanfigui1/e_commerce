
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Commandes</h4>
                  <div class="table-responsive pt-3">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Date de commande
                          </th>
                          <th>
                            Etat de commande
                          </th>
                          <th>
                            Totale
                          </th>
                          <th>
                            Client
                          </th>
                          <th>
                            Operation
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                         
                          foreach($cmds as $row) {
                            $clt=get_clientById($row['id_clt']);
                       foreach ($clt as $data) {
                            ?>

                              <tr class="">
                              <td>
                            <?php echo $row['id_cmd'];?>
                          </td>
                          <td>
                            <?php echo $row['date_cmd'];?>
                          </td>
                          <td>
                          $<?php echo $row['total'];?>
                          </td>
                          <td>
                          <?php echo $row['etat_cmd'];?>
                          </td>
                          <td>
                          <?php echo $data['mail'];?>
                          </td>
                          <td>
                          <a class="btn btn-dark" href="index.php/admin/pages/commande/mod?id=<?php echo $row['id_cmd']; ?>">modifier</a>
						  <a class="btn btn-light" href="index.php/admin/pages/commande/del?id=<?php echo $row['id_cmd']; ?>">supprimer</a>

                          </td>
                        </tr>

                          <?php
                            } }
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
       