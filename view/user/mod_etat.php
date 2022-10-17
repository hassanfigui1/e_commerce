<?php
   if($_REQUEST["id"]){
      $id = $_REQUEST['id'];
   }
?>

<?php include_once('../../model/model_commande.php');
include_once('../../php_requete/connexion.php');
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="operation">
<table class="table table-dark">
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         if(isset($_SESSION['client'])){
    
                            foreach($_SESSION['client'] as $clt){
                                $id_clt=$clt['id_clt'];
                            }  } 
                            $cmds=get_commandeById_cmd($id_clt,$id);
                         
                          foreach($cmds as $row) {
                            ?>

                              <tr class="">
                              <td id="commande"><?php echo $row['id_cmd'];?></td>
                          <td>
                            <?php echo $row['date_cmd'];?>
                          </td>
                          <td>
                          <select  id="etat">
                          <option value="en cours">en cours</option>
                          <option value="terminer">terminer</option>
                        </select>  
                          </td>
                          <td>
                          $<?php echo $row['total'];?>
                          </td>
                          
                         
                          
                        </tr>

                          <?php
                            }
                        ?>
                        
                      </tbody>
                    </table>
            </div>
</body>
</html>

<script>
  $(document).ready(function(){
    $("#etat").change(function(){
      var id = $("#commande").text();
      var etat = $("#etat").val();
      $("#operation").load("./user/cmd_terminer.php",{"id":id,"etat":etat});
    });
  
   
  });</script>