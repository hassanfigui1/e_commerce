
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">mes messages</h4>
                  <div class="table-responsive pt-3">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            email
                          </th>
                          <th>
                            subject
                          </th>
                          <th>
                            description
                          </th>
                          <th>
                            operation
                          </th>
                          <th>id commande</th>
                          <th>id client</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                         
                          foreach($msgs as $row) {
                              
                            ?>

                              <tr class="">
                              <td>
                            <?php echo $row['id_msg'];?>
                          </td>
                          <td>
                            <?php echo $row['email'];?>
                          </td>
                          <td>
                          <?php echo $row['subject'];?>
                          </td>
                          <td>
                          <?php echo $row['description'];?>
                          </td>
                          <td>
                          <a href="mailto:<?php echo $row['email'];?>">repondre</a>
                          </td>
                          <td>
                            <?php echo $row['id_cmd'];?>
                          </td>
                          <td>
                            <?php echo $row['id_clt'];?>
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
       