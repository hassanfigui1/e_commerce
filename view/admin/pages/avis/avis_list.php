
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Avis</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                          avis
                          </th>
                          <th>
                          rate
                          </th>
                          <th>
                            date
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
                         
                         
                          foreach($avis as $row) {
                            $clt=get_clientById($row['id_clt']);
                       foreach ($clt as $data) {
                            ?>
                <span hidden id="etoile<?php echo $row['id_avis'];?>"><?php echo $row['etoile'];?></span>

                              <tr class="">
                              <td>
                            <?php echo $row['id_avis'];?>
                          </td>
                          <td>
                            <?php echo $row['avis'];?>
                          </td>
                          <td>
                          
<span id="aviss<?php echo $row['id_avis'];?>"></span>
<script>

    var etoile= $('#etoile<?php echo $row['id_avis'];?>').text();
   
    var html='';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(etoile >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }
                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        $('#aviss<?php echo $row['id_avis'];?>').html(html);
    

</script>



                          </td>
                          <td>
                          <?php echo $row['date'];?>
                          </td>
                          <td>
                          <?php echo $data['mail'];?>
                          </td>
                          <td>
                          <a href="index.php/admin/pages/avis/del?id=<?php echo $row['id_avis']; ?>" class="btn btn-light">supprimer</a>
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
       