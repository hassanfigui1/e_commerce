
<?php include_once('../../model/model_commande.php');
include_once('../../php_requete/connexion.php');
session_start();

if(!empty($_REQUEST['id_clt'])){
  $id_clt = $_REQUEST['id_clt'];

}

if(isset($_REQUEST["id"]) && isset($_REQUEST["etat"])){
  $id = $_REQUEST['id'];
  $etat = $_REQUEST['etat'];
  update_commande_clt($etat,$id);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<span hidden  id="id_clt"><?php echo $id_clt; ?></span>
  <div id="operation">
<table class="table">
    <thead >
    <tr>
      <th scope="col">id_commande</th>
      <th scope="col">date de commande</th>
      <th scope="col">Totale</th>
      <th scope="col">Etat de commande</th>
      <th scope="col">option</th>
    </tr>
    </thead>
    <tbody>
    <?php  if(isset($_SESSION['client'])){
    
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }  } 
    $cmd=get_commandeById_Etat($id_clt,"terminer");

     foreach($cmd as $row){?>
<tr class="table"><td id="cmd<?php echo $row['id_cmd'];?>"><?php echo $row['id_cmd'];?></td>
<td><?php echo $row['date_cmd'];?></td>
<td><?php echo $row['total'];?>$</td>
<td id="etat<?php echo $row['id_cmd'];?>"><?php echo $row['etat_cmd'];?></td>
<td><button id="voir<?php echo $row['id_cmd'];?>" class="btn btn-success" type="button" >voir plus</button></td>
<td>
        <form method="get" action="index.php/user/message">
          <input type="hidden" name="id_cmd" value="<?php echo $row['id_cmd']?>">
          <input type="hidden" name="total" value="<?php echo $row['total']?>">
          <input type="hidden" name="date_cmd" value="<?php echo $row['date_cmd']?>">
          <input type="hidden" name="etat_cmd" value="<?php echo $row['etat_cmd']?>">
          <button class="btn btn-info" type="submit">Contacter</button>
        </form>
      </td>

<script>
  $(document).ready(function(){
   
    $("#voir<?php echo $row['id_cmd'];?>").click(function(){
      var id = $("#cmd<?php echo $row['id_cmd'];?>").text();
      var etat = $("#etat<?php echo $row['id_cmd'];?>").text();
      var id_clt = $("#id_clt").text();
      $("#operation").load("./user/voir_plus.php",{"id":id,"etat":etat,"id_clt":id_clt});
    });
   
  });</script>
</tr>
  
        <?php } ?>
    </tbody>
  </table>
  </div>
</body>
</html>

