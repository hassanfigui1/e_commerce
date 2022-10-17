<?php
function get_panierById_clt($clt){
    $con_bd=conn_sql();
     $stmt = $con_bd->prepare("SELECT id_prod,qte_prod,prix_total FROM panier where id_clt=".$clt);
     $stmt->execute();
     $panier = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $panier;
 }
 function add_panier($id_clt,$id_prod,$q,$total){
    $con_bd=conn_sql();
     $sql = "INSERT INTO panier (id_prod,id_clt,qte_prod,prix_total)
     VALUES (?,?,?,?)";
     // use exec() because no results are returned
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id_prod,$id_clt,$q,$total]);
 }
 function delete_panier($id_clt,$id_prod){
    $con_bd=conn_sql();
    $sql = "DELETE FROM panier WHERE id_prod=? and id_clt=?";
     $stmt= $con_bd->prepare($sql);
     $stmt->execute([$id_prod,$id_clt]);
  }

  function get_panierById_clt_prod($clt,$prod){
   $con_bd=conn_sql();
   $stmt = $con_bd->query("SELECT id_panier FROM panier where id_clt=".$clt." AND id_prod=".$prod);
    $panier = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $panier;
}

function get_count_item($id){
   $con_bd=conn_sql(); 
   $stmt = $con_bd->query("SELECT SUM(qte_prod) as quantite FROM panier where id_clt=".$id);
   $item = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $item;
 }
 

 function delete_panierByClt($id_clt){
   $con_bd=conn_sql();
   $sql = "DELETE FROM panier WHERE id_clt=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id_clt]);
 }

?>