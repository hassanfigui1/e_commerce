<?php

function save_lign_cmd($id_cmd,$total_prod,$qte_prod,$id_prod){
    $con_bd=conn_sql();
     $sql = "INSERT INTO ligne_commande
     VALUES (?,?,?,?)";
     // use exec() because no results are returned
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id_cmd,$id_prod,$qte_prod,$total_prod]);
 }
 function get_lign_cmdById($id){
    $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM ligne_commande where id_cmd=".$id);
    $lign = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $lign;
 }
 
?>



