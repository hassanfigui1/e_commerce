            <div id="leftDiv">
                <button id="cmd_en_cours" class="btn btn-info" type="button">Les commandes en cours</button>
                <br>
                <br>
                <button id="cmd_terminer"  class="btn btn-primary " type="button">Les commandes terminees</button>
                <br>
                <br>
                <button id="cmd_annuler"  class="btn btn-danger " type="button">Les commandes annulees</button>
                <br>
                <br>
           </div>
           
            <div id="rightDiv">
            </div>
            <div style="clear: both;"></div>
            <?php foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    } ?>
            <span hidden id="id_clt"><?php echo $id_clt; ?></span>
            
            <script>
$(document).ready(function(){
  $("#cmd_en_cours").click(function(){
    $("#rightDiv").load("./user/cmd_en_cours");
  });

  $("#cmd_terminer").click(function(){
    var id_clt = $("#id_clt").text();
    $("#rightDiv").load("./user/cmd_terminer",{"id_clt":id_clt});
  });

  $("#cmd_annuler").click(function(){
    $("#rightDiv").load("./user/cmd_annuler");
  });
});
</script>