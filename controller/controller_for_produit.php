<?php

function admin_produit_add(){
    if(!empty($_POST)){
        $nom=strlen($_POST['nom']);
        $prix=strlen($_POST['prix']);

        $tableau=array($_POST['nom'],$_POST['prix'],$_POST['date'],$_POST['quantite']);
        if(preg_match('/^[a-zA-Z ]+$/', $_POST['nom'])&& $nom>=3){
            if(preg_match("/^(0|[1-9]\d*)(\.\d{2})?$/", $_POST['prix']) && $prix<=6){
                if(preg_match("/^[0-9]+$/", $_POST['quantite'])){
                   
                    save_produit($_POST);
                    header('Location: /e_commerce/view/index.php/admin/pages/produit/List');
                    ob_end_flush();
                    exit();
                }else{
                    $libelles = get_libelle();
                    echo "le champs quantite ne contient aue les nombres";
                     require_once('../view/admin/pages/produit/add_prod.php');
                }
            }else{
                $libelles = get_libelle();
                echo "le champs prix est invalide";
                require_once('../view/admin/pages/produit/add_prod.php');
            }
        }else{
            $libelles = get_libelle();
            echo "le champs nom ne contient que les lettres";
            require_once('../view/admin/pages/produit/add_prod.php');
        }
    }else{
        $tableau=array('','','','');
        $libelles = get_libelle();
        require_once('../view/admin/pages/produit/add_prod.php');
    }
}
function admin_produit_list(){
    $produits =get_produit();
    require_once('../view/admin/pages/produit/prod_list.php');   
}
function admin_produit_del($id){
    delete_produit($id);
    header('Location: /e_commerce/view/index.php/admin/pages/produit/List');
    ob_end_flush();
    exit();
}
function admin_produit_mod($id){
    if(!empty($_POST)){
        $nom=strlen($_POST['nom']);
        $prix=strlen($_POST['prix']);
        if(preg_match('/^[a-zA-Z ]+$/', $_POST['nom'])&& $nom>=3){
            if(preg_match("/^(0|[1-9]\d*)(\.\d{2})?$/", $_POST['prix']) && $prix<=6){
                if(preg_match("/^[0-9]+$/", $_POST['quantite'])){
                    admin_produit_update($_POST,$id);
                    header('Location: /e_commerce/view/index.php/admin/pages/produit/List');
                    ob_end_flush();
                    exit();
                }else{
                    $prod=get_produitById($id);
                    $libelles = get_libelle();
                    echo "le champs quantite ne contient aue les nombres";
                     require_once('../view/admin/pages/produit/mod.php');
                }
            }else{
                $prod=get_produitById($id);
                $libelles = get_libelle();
                echo "le champs prix est invalide";
                require_once('../view/admin/pages/produit/mod.php');
            }
        }else{
            $prod=get_produitById($id);
            $libelles = get_libelle();
            echo "le champs nom ne contient que les lettres";
            require_once('../view/admin/pages/produit/mod.php');
        }
    }else{
        $prod=get_produitById($id);
        $libelles = get_libelle();
        require_once('../view/admin/pages/produit/mod.php');
    }
}

function admin_produit_update($data,$id){
    update_produit($data,$id);
}

function show_product($id){
    if(!empty($_POST)){
        $tableau=array($_POST['search']);
        $search=$_POST['search'];
        $cat=$_POST['cat'];
        $filtre=$_POST['filtre'];
        
        if(preg_match('/^[a-zA-Z ]+$/', $_POST['search']) ){
            $prod=search($filtre,$search,$cat);
            $catg=get_categorie();
            require_once('../view/user/shop.php');
        }else{
            $catg=get_categorie();
            $prod=get_product_By_Categorie($id);
            echo "le champs search doit contenir seulement les lettres !";
            require_once('../view/user/shop.php');
        }
    }else{
        $tableau=array('');
        $catg=get_categorie();
        $prod=get_product_By_Categorie($id);
        require_once('../view/user/shop.php');
    }
    
}
function prod_index(){
    $produits=get_produit();   
}
function produit_details($id){
    $avis=get_avisbyIdprod($id);
    $produits=get_produit();
    $detail=get_produitById($id);
    require_once('../view/user/produit_details.php');
}
?>