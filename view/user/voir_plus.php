<?php include_once('../../model/model_produit.php');
include_once('../../model/model_ligne_cmd.php');
include_once('../../model/model_commande.php');
include_once('../../php_requete/connexion.php');
session_start();

if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $lign=get_lign_cmdById($id);
    $COMMANDES=get_commandeById($id);
}
if(isset($_REQUEST['etat'])){
  $etat=$_REQUEST['etat'];
}
if(isset($_REQUEST['id_clt'])){
  $id_clt=$_REQUEST['id_clt'];
}
if(isset($_REQUEST['et'])){
  $et=$_REQUEST['et'];
  foreach($_SESSION['client'] as $clt){
    $id_clt=$clt['id_clt'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
  <div id="operation">
    <button class="btn btn-danger" onclick="pdfdownload('COMMANDE_<?php echo $id;?>')">EXPORT PDF</button>
    <div id="cmd_detail">
      <img src="./assets/images/bg.png" width="100px" hidden id="imgs" alt=""><br><br>
      <center><h1 id="titre" hidden>FACTURE DE LA COMMANDE <?php echo $id;?></h1></center>
<table class="table table-dark">
    <thead>
        
    <tr>
      <th scope="col">Nom produit</th>
      <th scope="col">Image</th>
      <th scope="col">prix</th>
      <th scope="col">Quantite</th>
      <?php if(isset($etat)){ ?>
        <th scope="col">avis</th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php  

     foreach($lign as $row){
        $prod=get_produitById($row['id_prod']);
        foreach($prod as $data){

         ?>
<tr class=""><input type="hidden" id="id_prod<?php echo $data['id_prod'];?>" value="<?php echo $data['id_prod'];?>">
  <td><?php echo $data['nom'];?></td>
<td><img src="./asset_user/images/produits/<?php echo $data['image'];?>" alt="">
</td>
<td><?php echo ($data['prix']*$row['quantite']);?>$</td>
<td><?php echo $row['quantite'];?></td>

<?php if(isset($etat)){ ?>
<td>    					<button type="button" name="add_review" id="add_review<?php echo $data['id_prod'];?>" class="btn btn-primary">avis</button>
</td>
<?php } ?>


<div id="review_modal<?php echo $data['id_prod'];?>" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star<?php echo $data['id_prod'];?> mr-1" id="submit_star<?php echo $data['id_prod'];?>_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star<?php echo $data['id_prod'];?> mr-1" id="submit_star<?php echo $data['id_prod'];?>_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star<?php echo $data['id_prod'];?> mr-1" id="submit_star<?php echo $data['id_prod'];?>_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star<?php echo $data['id_prod'];?> mr-1" id="submit_star<?php echo $data['id_prod'];?>_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star<?php echo $data['id_prod'];?> mr-1" id="submit_star<?php echo $data['id_prod'];?>_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review<?php echo $data['id_prod'];?>" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review<?php echo $data['id_prod'];?>">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

</tr>


<script>
$(document).ready(function(){

var rating_data = 0;

  $('#add_review<?php echo $data['id_prod'];?>').click(function(){

      $('#review_modal<?php echo $data['id_prod'];?>').modal('show');

  });

  $(document).on('mouseenter', '.submit_star<?php echo $data['id_prod'];?>', function(){

var rating = $(this).data('rating');

reset_background();

for(var count = 1; count <= rating; count++)
{

    $('#submit_star<?php echo $data['id_prod'];?>_'+count).addClass('text-warning');

}

});

function reset_background()
{
for(var count = 1; count <= 5; count++)
{

    $('#submit_star<?php echo $data['id_prod'];?>_'+count).addClass('star-light');

    $('#submit_star<?php echo $data['id_prod'];?>_'+count).removeClass('text-warning');

}
}

$(document).on('mouseleave', '.submit_star<?php echo $data['id_prod'];?>', function(){

reset_background();

for(var count = 1; count <= rating_data; count++)
{

    $('#submit_star<?php echo $data['id_prod'];?>_'+count).removeClass('star-light');

    $('#submit_star<?php echo $data['id_prod'];?>_'+count).addClass('text-warning');
}

});

$(document).on('click', '.submit_star<?php echo $data['id_prod'];?>', function(){

rating_data = $(this).data('rating');

});


$('#save_review<?php echo $data['id_prod'];?>').click(function(){

  var user_review = $('#user_review<?php echo $data['id_prod'];?>').val();
var id_prod= $('#id_prod<?php echo $data['id_prod'];?>').val();
var id_clt= $('#id_clt').text();

if(user_review == '')
{
    alert("Please Fill Field");
    return false;
}
else
{
    $.ajax({
        url:"../model/model_avis.php",
        method:"POST",
        data:{rating_data:rating_data, user_review:user_review, id_prod:id_prod, id_clt:id_clt},
        success:function(data)
        {
            $('#review_modal<?php echo $data['id_prod'];?>').modal('hide');
            alert(data);
        }
    })
}

});

});

</script>

        <?php } } ?>
    </tbody>
  </table>

  <table hidden id="infos" class="table table-dark">
    <thead>
        
    <tr>
      <th scope="col">id_commande</th>
      <th scope="col">date de commande</th>
      <th scope="col">Totale</th>
      <th scope="col">Etat de commande</th>
    </tr>
    </thead>
    <tbody>
    <?php 

     foreach($COMMANDES as $row){?>
<tr class="table-success"><td id="cmd<?php echo $row['id_cmd'];?>"><?php echo $row['id_cmd'];?></td>
<td><?php echo $row['date_cmd'];?></td>
<td><?php echo $row['total'];?>$</td>
<td><?php echo $row['etat_cmd'];?></td>

</tr>
  
        <?php } ?>
    </tbody>
  </table>

  </div>
  </div>
  

<span hidden  id="id_clt"><?php echo $id_clt; ?></span>
</body>
</html>

<script>
function pdfdownload(filename){
  $("#titre").removeAttr("hidden");
  $("#imgs").removeAttr("hidden");
  $("#infos").removeAttr("hidden");
  kendo.drawing.drawDOM($("#cmd_detail")).then(function(group){
    return kendo.drawing.exportPDF(
      group,{
        paperSize:"auto",
        margin:{
          left:"1cm",
          right:"1cm",
          top:"1cm",
          bottom:"1cm"
        }
      }
    );
  })
  .done(function(data){
    kendo.saveAs({
      dataURI:data,
      fileName:filename
    });
  });

}
</script>