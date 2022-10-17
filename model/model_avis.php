<?php
include_once('../php_requete/connexion.php');

if(isset($_POST['rating_data'])){
    $con_bd=conn_sql();
    $sql = "INSERT INTO avis (etoile, id_clt, id_prod, avis ,date)
     VALUES (?,?,?,?,?)";
     // use exec() because no results are returned
    $stmt= $con_bd->prepare($sql);
    $stmt->execute([$_POST['rating_data'],$_POST['id_clt'],$_POST['id_prod'],$_POST['user_review'],date('Y-m-d H:i:s')]);
    
    echo "ton avis a ete bien enregistrer";
}

function get_avisbyIdprod($id){
    $con_bd=conn_sql();
    $stmt = $con_bd->query("SELECT * FROM avis where id_prod=".$id);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $avis;
}

?>
