<?php
include_once('../php_requete/connexion.php');

function get_client(){
   $con_bd=conn_sql();
    $stmt = $con_bd->prepare("SELECT * FROM client");
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $clients;
}
function save_client($data){
   $con_bd=conn_sql();
   if($data['role']=="client")
      $data['role']=0;
    else
      $data['role']=1;
   $hash=password_hash($data['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO client (nom, prenom, mail, mot_pass, image,adress, ville, tele, admn)
    VALUES (?,?,?,?,?,?,?,?,?)";
    // use exec() because no results are returned
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([$data['nom'],$data['prenom'],$data['mail'],$hash,$data['image'],$data['adress'],$data['ville'],$data['tele'],$data['role']]);
}
 function update_client($data,$id){
   $con_bd=conn_sql();
   if($data['role']=="client")
      $data['role']=0;
    else
      $data['role']=1;
    $sql = "UPDATE client SET nom=?, prenom=?, mail=?, image=?, adress=?, ville=?, tele=?, admn=? WHERE id_clt=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$data['nom'],$data['prenom'],$data['mail'],$data['image'],$data['adress'],$data['ville'],$data['tele'],$data['role'], $id]);
 }
 function delete_client($id){
   $con_bd=conn_sql();
    $sql = "DELETE FROM client WHERE id_clt=?";
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$id]);
 }
 function get_clientById($id){
   $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM client where id_clt=".$id);
    $client = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $client;
 }

 function redirect($data){
   $con_bd=conn_sql(); 
   $stmt = $con_bd->prepare("SELECT mot_pass,admn  FROM client where mail=?");
   $stmt->execute([$data['mail']]); 
   $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user;
 }

 function get_clientBy_MAIL($data){
   $con_bd=conn_sql(); 
   $stmt = $con_bd->prepare("SELECT * FROM client where mail=?");
   $stmt->execute([$data['mail']]); 
   $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user;
 }
 
 function save_clients($data){
   $con_bd=conn_sql();
   $hash=password_hash($data['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO client (nom, prenom, mail, mot_pass, adress, ville, tele, admn)
    VALUES (?,?,?,?,?,?,?,?)";
    // use exec() because no results are returned
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([$data['nom'],$data['prenom'],$data['mail'],$hash,$data['adress'],$data['ville'],$data['tele'],0]);
}

function update_pass($pass,$mail){
   $con_bd=conn_sql(); 
   $hash=password_hash($pass, PASSWORD_DEFAULT);
   $sql = "UPDATE client SET mot_pass=? WHERE mail=?";
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([$hash, $mail]);
}

function save_msg($data){
   $con_bd=conn_sql();
    $sql = "INSERT INTO messagerie (email,subject,description,id_clt,id_cmd)
    VALUES (?,?,?,?,?)";
    // use exec() because no results are returned
   $stmt= $con_bd->prepare($sql);
   $stmt->execute([$data['mail'],$data['subject'],$data['description'],$data['id_clt'],$data['id_cmd']]);
}

function get_msg(){
   $con_bd=conn_sql();
    $stmt = $con_bd->prepare("SELECT * FROM messagerie");
    $stmt->execute();
    $msgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $msgs;
}


function update_clt($data,$id){
   $con_bd=conn_sql();
   if(!empty($data['confirm_password']) && !empty($data['password'])){
      if($data['confirm_password']==$data['password']){
         $hash=password_hash($data['password'], PASSWORD_DEFAULT);
         $sql = "UPDATE client SET nom=?, prenom=?, mail=?, mot_pass=?, image=?, adress=?, ville=?, tele=? WHERE id_clt=?";
         $stmt= $con_bd->prepare($sql);
         $stmt->execute([$data['nom'],$data['prenom'],$data['mail'],$hash,$data['image'],$data['adress'],$data['ville'],$data['tele'], $id]);     
      }
   }else{
      $sql = "UPDATE client SET nom=?, prenom=?, mail=?, image=?, adress=?, ville=?, tele=? WHERE id_clt=?";
      $stmt= $con_bd->prepare($sql);
      $stmt->execute([$data['nom'],$data['prenom'],$data['mail'],$data['image'],$data['adress'],$data['ville'],$data['tele'], $id]);
   
   }
   }

?>