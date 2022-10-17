<?php
ob_start();
include_once('../model/model_client.php');
include_once('../model/model_categorie.php');
include_once('../model/model_produit.php');
include_once('../model/model_panier.php');
include_once('../model/model_commande.php');
include_once('../model/model_ligne_cmd.php');
include_once('../model/model_avis.php');
?>
<?php
include_once('../controller/controller_for_client.php');
?>
<?php

include_once('../controller/controller_for_admin.php');
include_once('../controller/controller_for_categorie.php');
include_once('../controller/controller_for_produit.php');
include_once('../controller/controller_for_commande.php');

?>

<?php
session_start();
$uri= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if(strpos($uri,"admin") !== false){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        include_once 'template/header_user.php';
    }else{
        include_once 'template/header_admin.php';
    }
}else{
    include_once 'template/header_user.php';
}

?>
<?php
if('/e_commerce/view/index.php'==$uri){
    echo index();
}elseif('/e_commerce/view/index.php/user/index'==$uri){
    echo index();
}elseif('/e_commerce/view/index.php/user/login'==$uri){
    echo login();
}elseif('/e_commerce/view/index.php/user/account'==$uri){
    echo register();
}elseif('/e_commerce/view/index.php/user/message'==$uri){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo messagerie();
    }
}elseif('/e_commerce/view/index.php/user/cart'==$uri){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo cart();
    }
}elseif('/e_commerce/view/index.php/user/formulaire'==$uri){
    echo formulaire();
}elseif('/e_commerce/view/index.php/user/restpass'==$uri){
    echo resetP();
}elseif('/e_commerce/view/index.php/user/shop'==$uri and isset($_GET['id_categorie'])){
    echo show_product($_GET['id_categorie']);
}elseif('/e_commerce/view/index.php/user/details'==$uri and isset($_GET['id_prod'])){
    echo produit_details($_GET['id_prod']);
}elseif('/e_commerce/view/index.php/user/add_cart'== $uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo add_cart($_GET['id'],$_POST['quantity'],$_POST['prix_total']);
    } 
}elseif('/e_commerce/view/index.php/user/del'== $uri and isset($_GET['id_p'])){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo supp_panier($_GET['id_p']);
    }
}elseif('/e_commerce/view/index.php/user/billing'==$uri ){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo billing();
    }     
}elseif('/e_commerce/view/index.php/user/payer' ==$uri){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo payer();
    } 
}elseif('/e_commerce/view/index.php/user/traitement' ==$uri){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo traitement();
    }
}elseif('/e_commerce/view/index.php/user/commande' ==$uri){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo commande();
    }
}elseif('/e_commerce/view/index.php/user/parametre' ==$uri){
    if(isset($_SESSION['visiteur'])){
        echo index();
    }else{
        echo parametre();
    }
}elseif('/e_commerce/view/index.php/admin/index'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_index();
    }
}elseif('/e_commerce/view/index.php/admin/message'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_messagerie();
    }
}elseif('/e_commerce/view/index.php/admin/logout'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_logout();
    }
}elseif('/e_commerce/view/index.php/admin/site'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_site();
    }
}elseif('/e_commerce/view/index.php/admin/pages/utilisateur/add'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_user_add();
    }
}elseif('/e_commerce/view/index.php/admin/pages/utilisateur/List'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_user_list();
    }
}elseif('/e_commerce/view/index.php/admin/pages/utilisateur/del'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_user_del($_GET['id']);
    }
}elseif('/e_commerce/view/index.php/admin/pages/utilisateur/mod'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_user_mod($_GET['id']);
    }
}elseif('/e_commerce/view/index.php/admin/pages/categorie/add'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_categorie_add();
    }
}elseif('/e_commerce/view/index.php/admin/pages/categorie/List'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_categorie_list();
    }
}elseif('/e_commerce/view/index.php/admin/pages/categorie/del'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_categorie_del($_GET['id']);
    }
}elseif('/e_commerce/view/index.php/admin/pages/categorie/mod'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_categorie_mod($_GET['id']);
    }
}elseif('/e_commerce/view/index.php/admin/pages/produit/add'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_produit_add();
    }
}elseif('/e_commerce/view/index.php/admin/pages/produit/List'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_produit_list();
    }
}elseif('/e_commerce/view/index.php/admin/pages/produit/del'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_produit_del($_GET['id']);
    }
}elseif('/e_commerce/view/index.php/admin/pages/produit/mod'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_produit_mod($_GET['id']);
    }
    
}elseif('/e_commerce/view/index.php/admin/pages/commande/List'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_cmd_list();
    }
    
}elseif('/e_commerce/view/index.php/admin/pages/avis/List'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_avis_list();
    }
    
}elseif('/e_commerce/view/index.php/admin/pages/commande/del'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_cmd_del($_GET['id']);
    }
    
}elseif('/e_commerce/view/index.php/admin/pages/avis/del'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_avis_del($_GET['id']);
    }
    
}elseif('/e_commerce/view/index.php/admin/pages/commande/mod'==$uri and isset($_GET['id'])){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_cmd_mod($_GET['id']);
    }
    
}elseif('/e_commerce/view/index.php/admin'==$uri){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        echo index();
    }else{
        echo admin_index();
    }
}elseif('/e_commerce/view/index.php/user'==$uri){
    echo index();
}else{
    echo index();
}
?>

<?php
if(strpos($uri,"admin") !== false){
    if(isset($_SESSION['visiteur']) || isset($_SESSION['client'])){
        include_once('template/footer_user.php');
    }else{
        include_once('template/footer_admin.php');
    }
}else{
    include_once('template/footer_user.php');
}


?>