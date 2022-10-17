<?php

function get_produit(){
   $con_bd=conn_sql();
    $stmt = $con_bd->prepare("SELECT * FROM produit ");
    $stmt->execute();
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $produits;
}
function save_produit($data){
   $con_bd=conn_sql();
   $stmt = $con_bd->query("SELECT id_categorie FROM categorie where libelle='".$data['cat']."'");
   $row = $stmt->fetch();
   $sql = "INSERT INTO produit (nom, prix, image, date_creation, quantite, id_categorie)
   VALUES (?,?,?,?,?,?)";
   // use exec() because no results are returned
  $stmt= $con_bd->prepare($sql);
  $stmt->execute([$data['nom'],$data['prix'],$data['image'],$data['date'],$data['quantite'],$row['id_categorie']]);
}
 function update_produit($data,$id){
   $con_bd=conn_sql();
   $stmt = $con_bd->query("SELECT id_categorie FROM categorie where libelle='".$data['cat']."'");
    $row = $stmt->fetch();
   
    $sql = "UPDATE produit SET nom=?, prix=?, image=?, date_creation=?, quantite=?, id_categorie=? WHERE id_prod=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$data['nom'],$data['prix'],$data['image'],$data['date'],$data['quantite'],$row['id_categorie'],$id]);
 }
 function delete_produit($id){
   $con_bd=conn_sql();
    $sql = "DELETE FROM produit WHERE id_prod=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id]);
 }
 function get_produitById($id){
   $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM produit where id_prod=".$id);
    $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $produit;
 }
 function get_product_By_Categorie($id){
   $con_bd=conn_sql(); 
   $stmt = $con_bd->query("SELECT * FROM produit where id_categorie=".$id);
   $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $prod;
 }
 function get_count_product($id){
   $con_bd=conn_sql(); 
   $stmt = $con_bd->query("SELECT * FROM produit where id_categorie=".$id);
   $produ = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $produ;
 }
 function search($filtre,$search,$cat){
    if($filtre=='sans'){
      $con_bd=conn_sql();
      $stmt = $con_bd->query("SELECT * FROM produit where id_categorie=".$cat." AND nom like '%$search%'");
      $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $produit;
    }elseif($filtre=='ordre_croissant'){
      $con_bd=conn_sql();
      $stmt = $con_bd->query("SELECT * FROM produit where id_categorie=".$cat." AND nom like '%$search%' order by prix asc");
      $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $produit;
    }elseif($filtre=='ordre_decroissant'){
      $con_bd=conn_sql();
      $stmt = $con_bd->query("SELECT * FROM produit where id_categorie=".$cat." AND nom like '%$search%' order by prix desc");
      $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $produit;
    }
 }

 function get_QuantitesById($id){
  $con_bd=conn_sql();
  $stmt = $con_bd->query("SELECT * FROM produit where id_prod=".$id);
  $qte = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $qte;
 }
 
?>







