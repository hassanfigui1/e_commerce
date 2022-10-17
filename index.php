<?php 
session_start();
if(empty($_SESSION['client']) && empty($_SESSION['admin'])){
    $_SESSION['visiteur']="visiteur";
}
header("Location: view/index.php");
?>


