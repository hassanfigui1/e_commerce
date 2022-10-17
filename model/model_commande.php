<?php
function get_commande(){
    $con_bd=conn_sql();
    $stmt = $con_bd->prepare("SELECT * FROM commande ");
    $stmt->execute();
    $cmds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cmds;
}

function get_avis(){
   $con_bd=conn_sql();
   $stmt = $con_bd->prepare("SELECT * FROM avis ");
   $stmt->execute();
   $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $avis;
}

function save_commande($sum,$id_clt){
    $con_bd=conn_sql();
    $sql = "INSERT INTO commande (date_cmd, total, etat_cmd, id_clt)
    VALUES (?,?,?,?)";
    // use exec() because no results are returned
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([date('Y-m-d H:i:s'),$sum,"en cours",$id_clt]);
}
function update_commande($data,$id){
    $con_bd=conn_sql();
     $sql = "UPDATE commande SET etat_cmd=? WHERE id_cmd=?";
     $stmt= $con_bd->prepare($sql);
     $stmt->execute([$data['etat_cmd'],$id]);
  }

 function get_commandetByIdclt_date($id){
    $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT id_cmd FROM commande where id_clt=".$id." AND date_cmd=(select max(date_cmd) from commande where id_clt=".$id.")");
    $commande = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $commande;
 }

 function delete_commande($id){
   $con_bd=conn_sql();
   $sql = "DELETE FROM commande WHERE id_cmd=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id]);
 }

 function delete_avis($id){
   $con_bd=conn_sql();
   $sql = "DELETE FROM avis WHERE id_avis=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id]);
 }

 function get_commandeById($id){
    $con_bd=conn_sql();
     $stmt = $con_bd->query("SELECT * FROM commande where id_cmd=".$id);
     $cmd = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $cmd;
  }
  function get_commandeById_Etat($id,$etat){
   $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM commande where id_clt=".$id." AND etat_cmd='".$etat."'");
    $cmd = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cmd;
 }

 function get_commandeById_cmd($id,$id_cmd){
   $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM commande where id_clt=".$id." AND id_cmd=".$id_cmd);
    $cmd = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cmd;
 }

 function update_commande_clt($etat,$id){
   $con_bd=conn_sql();
    $sql = "UPDATE commande SET etat_cmd=? WHERE id_cmd=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$etat,$id]);
 }

?>