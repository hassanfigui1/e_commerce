<?php
include_once('../php_requete/connexion.php');

function get_categorie(){
   $con_bd=conn_sql();
    $stmt = $con_bd->prepare("SELECT * FROM categorie ");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
function save_categorie($data){
   $con_bd=conn_sql();
    $sql = "INSERT INTO categorie (libelle)
    VALUES (?)";
    // use exec() because no results are returned
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([$data['libelle']]);
}
 function update_categorie($data,$id){
   $con_bd=conn_sql();
   $sql = "UPDATE categorie SET libelle=? WHERE id_categorie=?";
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([$data['libelle'],$id]);
 }

 function delete_categorie($id){
   $con_bd=conn_sql();
   $sql = "DELETE FROM categorie WHERE id_categorie=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id]);
 } 

 function get_categorieById($id){
   $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM categorie where id_categorie=".$id);
    $categorie = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categorie;
 }

 function get_libelle(){
   $con_bd=conn_sql();
   $stmt = $con_bd->query("SELECT libelle FROM categorie ");
   $libelles = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $libelles;
 }

 function get_libelleById($id){
   $con_bd=conn_sql();
   $stmt = $con_bd->query("SELECT libelle FROM categorie where id_categorie=".$id);
   $lib = $stmt->fetch();
   return $lib;
 }


?>


