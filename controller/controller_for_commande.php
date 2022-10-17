<?php
function admin_cmd_list(){
    $cmds =get_commande();
    require_once('../view/admin/pages/commande/cmd_list.php');   
}

function admin_cmd_mod($id){
    if(!empty($_POST)){
        admin_cmd_update($_POST,$id);
        if($_POST['etat_cmd']=="annuler"){
            $m=$_POST['id_clt'];
            mailcmdannuler($m,$id);
        }
        if($_POST['etat_cmd']=="livrer"){
            $m=$_POST['id_clt'];
            mailcmdlivrer($m,$id);
        }
        if($_POST['etat_cmd']=="terminer"){
            $m=$_POST['id_clt'];
            mailcmdtermine($m,$id);
        }
        header('Location: /e_commerce/view/index.php/admin/pages/commande/List');
        ob_end_flush();
        exit();
    }else{
        $cmd=get_commandeById($id);
        require_once('../view/admin/pages/commande/mod.php');
    }
}

function admin_cmd_update($data,$id){
    update_commande($data,$id);
}

function admin_cmd_del($id){
    delete_commande($id);
    header('Location: /e_commerce/view/index.php/admin/pages/commande/List');
    ob_end_flush();
    exit();
}

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    

    function mailcmdannuler($m,$id){
   
    
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
                            <p>Entreprise Tasmim Web</p>
                            <h1>votre commande Num ".$id." a été Annuleer!</h1>
                            <br>
                            <h2>nous sommes DESOLEE ..</h2>
                            </body>
                            </html>
                            ";
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'MAIL D"annulation du commande!';
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
     }

     
    function mailcmdlivrer($m,$id){
   
    
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
                            <p>Entreprise Tasmim Web</p>
                            <h1>votre commande Num ".$id." a été Livrer!</h1>
                            <br>
                            <a class='btn cart-bg ' href='http://localhost/e_commerce/view/index.php/user/commande'>  VOIR VOTRE COMMANDE</a>  
                            </body>
                            </html>
                            ";
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'MAIL De Livraison du commande!';
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
     }
    
      
    function mailcmdtermine($m,$id){
   
    
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
                            <p>Entreprise Tasmim Web</p>
                            <h1>votre commande Num ".$id." a été terminé!</h1>
                            <br>
                            <a class='btn cart-bg ' href='http://localhost/e_commerce/view/index.php/user/commande'>  VOIR VOTRE COMMANDE</a>  
                            </body>
                            </html>
                            ";
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'MAIL du commande!';
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
     }
    
?>
