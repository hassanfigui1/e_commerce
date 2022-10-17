<?php
function index(){
    $produits=get_produit();
    $categories =get_categorie();
    require_once('../view/user/index.php');
}
function login(){
    if(!empty($_POST)){
        $user = redirect($_POST);
        $tableau=array($_POST['mail']);
        $valid=false;
        if($user){
        foreach($user as $row){
        
        // verifier le hashing against the password entered
        $verify = password_verify($_POST['mdp'], $row['mot_pass']);
        
        // afficher les resultat depending if they match
        if ($verify) {
          //  echo 'Password Verified!';
              if($row['admn']==0){
                  header('location: /e_commerce/view/index.php/user/index');
                  $_SESSION['client']= get_clientBy_MAIL($_POST);
                  unset($_SESSION['visiteur']);
                  $valid=true;
              }else{
                  $_SESSION['admin']= get_clientBy_MAIL($_POST);
                  unset($_SESSION['visiteur']);
                  header('location: /e_commerce/view/index.php/admin/index');
                  $valid=true;
              }
          
        } else {
            echo 'Incorrect Password!';
            require_once('../view/user/login.php');
            $valid=true;
        }
         
          }
        }else{
            if(isset($_GET['ver']) && $_GET['ver']==7){
                save_clients($_POST);
                echo "VOTRE COMPTE A ETE BIEN CREER!";
                header('Location: /e_commerce/view/index.php/user/login');
                ob_end_flush();
                exit();
            }
            if(!$valid){
                echo 'pas de compte avec ce mail!';
                require_once('../view/user/login.php');
              }
            
        }

    }else{
        $tableau=array('');
        require_once('../view/user/login.php');
    }
    
}
function register(){
    if(!empty($_POST)){ 
        $valeurr=strlen($_POST['tele']);
        $nom=strlen($_POST['nom']);
        $prenom=strlen($_POST['prenom']);
        $ville=strlen($_POST['ville']);
        $adress=strlen($_POST['adress']);
        $tableau=array($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tele'],$_POST['ville'],$_POST['adress'],$_POST['password'],$_POST['confirm_password']);
        $value=strlen($_POST['password']);
        if(preg_match('/^[a-zA-Z]+$/', $_POST['nom']) &&  preg_match('/^[a-zA-Z]+$/', $_POST['prenom']) && preg_match('/^[a-zA-Z]+$/', $_POST['ville']) && $nom>=3 && $prenom>=3 && $ville>=3){
            if(preg_match("/^[0-9]+$/", $_POST['tele']) && $valeurr==10){
                if(preg_match("/^[0-9a-zA-Z ,.:;-]+$/", $_POST['adress']) && $adress>=10){
                    if(preg_match("/^[0-9a-zA-Z .]+$/", $_POST['password']) && $value>=6 && preg_match("/^[0-9a-zA-Z .]+$/", $_POST['confirm_password']) ){
                            if($_POST['password']==$_POST['confirm_password']){
                                if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['mail'])){
                                    $user = redirect($_POST);
                                    if(!$user){
                                    sendmail($_POST);
                                    require_once('../view/user/register.php');
                                    }else{
                                        echo "ce mail existe deja";
                                        require_once('../view/user/register.php');
                                    }
                                }else{
                                    echo "l'email est invalid'";
                                    require_once('../view/user/register.php'); 
                                }      
                            }else{
                                echo "les champs password et confirm password ne sont pas égaux";
                                require_once('../view/user/register.php');  
                            }
                    }else{
                        echo "les champs password et confirm password contient seulement les lettres et les nombres et le caracters . et plus de 6 caracters";
                        require_once('../view/user/register.php');
                    }
                       
                }else{
                    echo "le champs adress est seulement un text et contient les lettres et les nombres et les caracters . , : ; - et au moins 6 caracteres";
                    require_once('../view/user/register.php');
                }
            }else{
            echo "le champs tele contient selement les nombres and contient 10 chiffres ";
            require_once('../view/user/register.php');
            }
        }else{
            echo "les champs nom prenom et ville doivent contenir seulement les lettres et au moins 3 caractere";
            require_once('../view/user/register.php');
        }
    }else{
        $tableau=array('','','','','','','','');
        require_once('../view/user/register.php');
    }

}
function cart(){
    if(isset($_SESSION['client'])){
        foreach($_SESSION['client'] as $clt){
            $id_clt=$clt['id_clt'];
        }
        $items=get_count_item($id_clt);
        $add=get_panierById_clt($id_clt);
        require_once('../view/user/cart.php');
    }else{
        echo "veuillez se connecter ou de s'inscrire pour acceder votre panier";
        header('location: /e_commerce/view/index.php/user/index');
    }
}
function add_cart($id,$q,$total){
        if(isset($_SESSION['client'])){
            $qtes=get_QuantitesById($id);
            foreach($qtes as $quant){
                $quanti=$quant['quantite'];
            }
            if($quanti>$q){

            foreach($_SESSION['client'] as $clt){
                $id_clt=$clt['id_clt'];
            }
            $pa=get_panierById_clt_prod($id_clt,$id);
            if($pa==null){
                add_panier($id_clt,$id,$q,$total);
            }
            $items=get_count_item($id_clt);
            $add=get_panierById_clt($id_clt);
            require_once('../view/user/cart.php');
    }else{
        $_SESSION['msg1']="quantite n'est pas disponible";
        header('Location: /e_commerce/view/index.php/user/details?id_prod='.$id);
        ob_end_flush();
        exit();
    }
}else{
    echo "veuillez se connecter ou de s'inscrire pour remplir votre panier";
    header('location: /e_commerce/view/index.php/user/index');
}
}
function supp_panier($id){
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }
    delete_panier($id_clt,$id);
    header('Location: /e_commerce/view/index.php/user/cart');
    ob_end_flush();
    exit();
}
function billing(){
    if($_SESSION['sum']==0)
        header('Location: /e_commerce/view/index.php/user/cart');
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }
    $items=get_count_item($id_clt);
    $clt=get_clientById($id_clt);
    require_once('../view/user/billing.php');
}
function payer(){
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }
    $items=get_count_item($id_clt);
    $clt=get_clientById($id_clt);
    require_once('../view/user/payer.php');
}

 function traitement(){
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
        $m=$clt['mail'];
    }
    save_commande($_SESSION['sum'],$id_clt);
    $cmd=get_commandetByIdclt_date($id_clt); //recent date
    $add=get_panierById_clt($id_clt);
    foreach($cmd as $c){
        $id_cmd=$c['id_cmd'];
    }
    foreach($add as $p){
        save_lign_cmd($id_cmd,$p['prix_total'],$p['qte_prod'],$p['id_prod']);
    }
    delete_panierByClt($id_clt);
    mailcmdsucces($m);
    require_once('../view/user/succes.php');
 }

 function commande(){
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }
    $cmd1=get_commandeById_Etat($id_clt,"terminer");
    $cmd2=get_commandeById_Etat($id_clt,"annuler");
    require_once('../view/user/commande.php');
 }

 
  //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../view/PHPMailer/Exception.php';
    require '../view/PHPMailer/PHPMailer.php';
    require '../view/PHPMailer/SMTP.php';
    
 function sendmail($data){
   
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hassanfiguiggui@gmail.com';                     //SMTP username
        $mail->Password   = 'wufaajkrryiartqe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('hassanfiguiggui@gmail.com', 'ADMIN');
        $mail->addAddress($data['mail'], $data['nom']);     //Add a recipient
       
    
        $message = "
                        <html>
                        <head>
                        <title>My Shop</title>
                        <style type='text/css'>
                            p{
                                text-align:center;
                                background-color:#19191E;
                                height:50px;
                                color:white;
                                font-size:18pt;
                                padding-top:5px;
                            }
                            input{
                                background-color:#19191E;
                                color:#44D62C;
                                font-size: 16pt;
                            }
                        </style>
                        </head>
                        <body>
                        <p>Entreprise tasmim web</p>
                        Merci de cliquer ci dessus pour confirmer votre email!
                        <form action='http://localhost/e_commerce/view/index.php/user/login?ver=7' method='POST'>
                          <input type='hidden' name='nom' value='".$data['nom']."'>
                          <input type='hidden' name='prenom' value='".$data['prenom']."'>
                          <input type='hidden' name='mail' value='".$data['mail']."'>
                          <input type='hidden' name='ville' value='".$data['ville']."'>
                          <input type='hidden' name='adress' value='".$data['adress']."'>
                          <input type='hidden' name='tele' value='".$data['tele']."'>
                          <input type='hidden' name='password' value='".$data['password']."'>
                          <input type='submit' name='formins'>
                        </form>
                        </body>
                        </html>
                        ";
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'MAIL DE VERIFICATION!';
        $mail->Body    = $message;
    
        $mail->send();
        echo "veuillez confirmer votre inscription par mail;";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 }

 
 function resetpassword($data){
   
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hassanfiguiggui@gmail.com';                     //SMTP username
        $mail->Password   = 'wufaajkrryiartqe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('hassanfiguiggui@gmail.com', 'ADMIN');
        $mail->addAddress($data['mail']);     //Add a recipient
       
    
        $message = "
                        <html>
                        <head>
                        <title>My Shop</title>
                        <style type='text/css'>
                            p{
                                text-align:center;
                                background-color:#19191E;
                                height:50px;
                                color:white;
                                font-size:18pt;
                                padding-top:5px;
                            }
                            input{
                                background-color:#19191E;
                                color:#44D62C;
                                font-size: 16pt;
                            }
                        </style>
                        </head>
                        <body>
                        <p>Entreprise Tasmim web </p>
                        Merci de cliquer ci dessus pour confirmer votre email!
                        <form action='http://localhost/e_commerce/view/index.php/user/restpass' method='GET'>
                            <input type='hidden' name='mail' value='".$data['mail']."'>
                          <input type='submit' name='formins'>
                        </form>
                        </body>
                        </html>
                        ";
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'MAIL DE recuperation du mot de passe!';
        $mail->Body    = $message;
    
        $mail->send();
        echo "check your mail for reset ;";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 }

 
 function mailcmdsucces($m){
   
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hassanfiguiggui@gmail.com';                     //SMTP username
        $mail->Password   = 'wufaajkrryiartqe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('hassanfiguiggui@gmail.com', 'ADMIN');
        $mail->addAddress($m);     //Add a recipient
       
    
        $message = "
                        <html>
                        <head>
                        <title>My Shop</title>
                        <style type='text/css'>
                            p{
                                text-align:center;
                                background-color:#19191E;
                                height:50px;
                                color:white;
                                font-size:18pt;
                                padding-top:5px;
                            }
                            input{
                                background-color:#19191E;
                                color:#44D62C;
                                font-size: 16pt;
                            }
                        </style>
                        </head>
                        <body>
                        <p>Entreprise Tasmim web</p>
                        <h1>votre operation de paiement est effectué avec succès !</h1>
                        <br>
                        <h2>nous vous remerciez ..</h2>
                        <a class='btn cart-bg ' href='http://localhost/e_commerce/view/index.php/user/commande'>  VOIR VOTRE COMMANDE</a>  
                        </body>
                        </html>
                        ";
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'MAIL DE success du commande!';
        $mail->Body    = $message;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 }


 function formulaire(){
    if(!empty($_POST)){
        $user = redirect($_POST);
        $tableau=array($_POST['mail']);
        if($user){
            resetpassword($_POST);
            require_once('../view/user/formulaire.php');
        }
        else{
            echo "pas de compte avec ce mail !!";
            require_once('../view/user/formulaire.php');
        }
    }else{
        $tableau=array('');
        require_once('../view/user/formulaire.php');
    }
 }

 function resetP(){
    $mail=$_GET['mail'];
        if(!empty($_POST)){
            $value=strlen($_POST['pass']);
            if(preg_match("/^[0-9a-zA-Z .]+$/", $_POST['pass']) && $value>=6 && preg_match("/^[0-9a-zA-Z .]+$/", $_POST['pass2']) ){
                    if($_POST['pass']==$_POST['pass2']){
                        update_pass($_POST['pass'],$mail);
                        header('Location: /e_commerce/view/index.php/user/login');
                        ob_end_flush();
                        exit();
                    }else{
                        echo "les mots de passes ne sont pas identiques !";
                        require_once('../view/user/reset.php');
                    }
        }else{
            echo "les champs password et confirm password contient seulement les lettres et les nombres et le caracters . et plus de 6 caracters";
            require_once('../view/user/reset.php');
        }
        }else{
                require_once('../view/user/reset.php');
        }
    
   

 }
 function messagerie(){
    if(!empty($_POST)){
        $tableau=array($_POST['subject'],$_POST['description']);
        $subject=strlen($_POST['subject']);
        $description=strlen($_POST['description']);
        if(preg_match('/^[a-zA-Z ]+$/', $_POST['subject']) && $subject>=5 ){
            if(preg_match("/^[0-9a-zA-Z ,.:;-]+$/", $_POST['description']) && $description>=10){
                save_msg($_POST);
                echo "message envoyer !";
                require_once('../view/user/message.php');
            }else{
                echo "le champs description est seulement un text et contient les lettres et les nombres et les caracters . , : ; - et au moins 10 caracteres";
                require_once('../view/user/message.php');
            }
        }else{
            echo "le champs subject doit contenir seulement les lettres et au moins 5 caractere";
            require_once('../view/user/message.php');
        }
       
    }else{
        $tableau=array('','');
        require_once('../view/user/message.php');
    }
}
function parametre(){
    foreach($_SESSION['client'] as $clt){
        $id_clt=$clt['id_clt'];
    }
    $client=get_clientById($id_clt);
    if(!empty($_POST)){
        $valeurr=strlen($_POST['tele']);
        $nom=strlen($_POST['nom']);
        $prenom=strlen($_POST['prenom']);
        $ville=strlen($_POST['ville']);
        $adress=strlen($_POST['adress']);
        $value=strlen($_POST['password']);
        if(preg_match('/^[a-zA-Z]+$/', $_POST['nom']) &&  preg_match('/^[a-zA-Z]+$/', $_POST['prenom']) && preg_match('/^[a-zA-Z]+$/', $_POST['ville']) && $nom>=3 && $prenom>=3 && $ville>=3){
            if(preg_match("/^[0-9]+$/", $_POST['tele']) && $valeurr==10){
                if(preg_match("/^[0-9a-zA-Z ,.:;-]+$/", $_POST['adress']) && $adress>=10){
                                    if(!empty($_POST['confirm_password']) && !empty($_POST['password'])){ 
                                        if(preg_match("/^[0-9a-zA-Z .]+$/", $_POST['password']) && $value>=6 && preg_match("/^[0-9a-zA-Z .]+$/", $_POST['confirm_password']) ){
                                        if($_POST['confirm_password']==$_POST['password']){
                                            update_clt($_POST,$id_clt);
                                            echo "votre compte est modifie avec success !";
                                        require_once('../view/user/parametre.php');
                                        }else{
                                            echo "MOT DE PASSE ne sont pas identique !";
                                        require_once('../view/user/parametre.php');
                                        }  
                                    }else{
                                        echo "les champs password et confirm password contient seulement les lettres et les nombres et le caracters . et plus de 6 caracters";
                                        require_once('../view/user/parametre.php');   
                                    }
                                    }else{
                                        update_clt($_POST,$id_clt);
                                        echo "votre compte est modifie avec success !";
                                        require_once('../view/user/parametre.php');
                                    } 
                                   
                   
                       
                }else{
                    echo "le champs adress est seulement un text et contient les lettres et les nombres et les caracters . , : ; - et au moins 6 caracteres";
                    require_once('../view/user/parametre.php');   
                }
            }else{
            echo "le champs tele contient selement les nombres and contient 10 chiffres ";
            require_once('../view/user/parametre.php');   
            }
        }else{
            echo "les champs nom prenom et ville doivent contenir seulement les lettres et au moins 3 caractere";
            require_once('../view/user/parametre.php');   
        }
    }else{
        require_once('../view/user/parametre.php');    
    }
   
    
}


?>