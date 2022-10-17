
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
  <div id="operation">
<table class="table table-dark">
    <thead>
        
    <tr>
      <th scope="col">id cmd</th>
      <th scope="col">date cmd</th>
      <th scope="col">Totale</th>
      <th scope="col">Etat cmd</th>
      <th scope="col">Option</th>
    </tr>
    </thead>
    <tbody>
    <?php  if(isset($_SESSION['client'])){
    
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }  } 
    $cmd=get_commandeById_Etat($id_clt,"en cours");

     foreach($cmd as $row){?>
<tr class="table"><td id="cmd<?php echo $row['id_cmd'];?>"><?php echo $row['id_cmd'];?></td>
<td><?php echo $row['date_cmd'];?></td>
<td><?php echo $row['total'];?>$</td>
<td><?php echo $row['etat_cmd'];?></td>
<td><button id="mod<?php echo $row['id_cmd'];?>" type="button" class="btn btn-primary" >modifier</button>
<button id="voir<?php echo $row['id_cmd'];?>" type="button" class="btn btn-success">voir plus</button>
		<td>
			<form method="get" action="index.php/user/message">
				<input type="hidden" name="id_cmd" value="<?php echo $row['id_cmd']?>">
				<input type="hidden" name="total" value="<?php echo $row['total']?>">
				<input type="hidden" name="date_cmd" value="<?php echo $row['date_cmd']?>">
				<input type="hidden" name="etat_cmd" value="<?php echo $row['etat_cmd']?>">
				<button class="btn btn-info" type="submit">Contacter</button>
		  </form>
		</td>
</td>

<script>
  $(document).ready(function(){
    $("#mod<?php echo $row['id_cmd'];?>").click(function(){
      var id = $("#cmd<?php echo $row['id_cmd'];?>").text();
      $("#operation").load("./user/mod_etat.php",{"id":id});
    });

    $("#voir<?php echo $row['id_cmd'];?>").click(function(){
      var id = $("#cmd<?php echo $row['id_cmd'];?>").text();
      $("#operation").load("./user/voir_plus.php",{"id":id});
    });
  
   
  });</script>
</tr>
  
        <?php }     $cmd=get_commandeById_Etat($id_clt,"livrer");
         foreach($cmd as $row){
        ?>
       
<tr class=""><td id="cmd<?php echo $row['id_cmd'];?>"><?php echo $row['id_cmd'];?></td>
<td><?php echo $row['date_cmd'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['etat_cmd'];?></td>
<td><button id="mod<?php echo $row['id_cmd'];?>" type="button" class="btn btn-primary" >modifier</button>
<button id="voir<?php echo $row['id_cmd'];?>" type="button" class="btn btn-success" >voir plus</button>
     <td>
        <form method="get" action="index.php/user/message">
          <input type="hidden" name="id_cmd" value="<?php echo $row['id_cmd']?>">
          <input type="hidden" name="total" value="<?php echo $row['total']?>">
          <input type="hidden" name="date_cmd" value="<?php echo $row['date_cmd']?>">
          <input type="hidden" name="etat_cmd" value="<?php echo $row['etat_cmd']?>">
          <button class="btn btn-info" type="submit">Contacter</button>
        </form>
      </td>
</td>

<script>
  $(document).ready(function(){
    $("#mod<?php echo $row['id_cmd'];?>").click(function(){
      var id = $("#cmd<?php echo $row['id_cmd'];?>").text();
      $("#operation").load("./user/mod_etat.php",{"id":id});
    });

    $("#voir<?php echo $row['id_cmd'];?>").click(function(){
      var id = $("#cmd<?php echo $row['id_cmd'];?>").text();
      $("#operation").load("./user/voir_plus.php",{"id":id});
    });
  
   
  });</script>
</tr>
  <?php } ?>
    </tbody>
  </table>
  </div>
</body>
</html>

