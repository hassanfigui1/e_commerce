<?php
if(isset($_GET['logout'])){
    session_unset();
    $_SESSION['visiteur']="visiteur";
}              
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuesT - Home</title>
    <base href="http://localhost/e_commerce/view/">
    <link rel="stylesheet" href="./asset_user/dist/main.css">
    <link rel="stylesheet" href="./asset_user/assets/css/style.css">
    <link rel="stylesheet" href="./asset_user/assets/css/styless.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
</head>

<body>
    <!-- Header Area Start -->
    <header class="header">
                      
        <div class="header-bottom">
            <div class="container">
                <div class="d-none d-lg-block">
                    <nav class="menu-area d-flex align-items-center">
                        <div class="logo">
                            <a href="index.php/user/index"><img src="./assets/images/bg.png" width="100px" alt="logo"/></a>
                        </div>
                        <ul class="main-menu d-flex align-items-center">
                            <li><a class="active" href="index.php/user/index">Accueil
</a></li>
                            <li>
                                <a href="javascript:void(0)">Categories
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.98" height="5.69"
                                        viewBox="0 0 9.98 5.69">
                                        <g id="Arrow" transform="translate(0.99 0.99)">
                                            <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l4,4,4-4"
                                                transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                        </g>
                                    </svg>
                                </a>
                                <ul class="sub-menu">
                                    <?php
                                    $catg=get_categorie();
                                    foreach($catg as $data){

                                  
                                    
                                    ?>
                                    <li><a href="index.php/user/shop?id_categorie=<?php echo $data['id_categorie'];?>"><?php echo $data['libelle'];?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="index.php/admin/index"><?php
                                    if(isset($_SESSION['admin'])){
                                        echo "Admin";
                                    } 
                                    ?></a></li>
                                    <li><a href="index.php/user/commande"><?php if(isset($_SESSION['client'])){
                                        echo "Mes commandes";
                                    }    ?></a></li>
                                    <li><a href="index.php/user/parametre"><?php if(isset($_SESSION['client'])){
                                        echo "Paramètres";
                                    }    ?></a></li>
                        </ul>
                        
                        <div class="menu-icon ml-auto">
                            <ul>
                                <li>
                                    <a href="index.php/user/cart"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1531.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1541.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </a>
                                    
                                </li>
                                <li>
                                    <?php
                                    if(empty($_SESSION['client']) and empty($_SESSION['admin'])){         
                                    ?>
                                    <a href="index.php/user/login"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="20" viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#fff" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg></a>
                                        <?php
                                         }else{
                                             if(isset($_SESSION['client'])){
                                                 $session=$_SESSION['client'];
                                             }else{
                                                $session=$_SESSION['admin'];
                                             }
                                            foreach($session as $row){
                                                    echo "WELCOME! ". $row['nom'];
                                                    echo " <a href='index.php/user/index?logout=12'>LOGOUT</a>";
                                        ?>
                                                
                                        <?php
                                        }
                                
                                         }
                                          
                                        ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
               
                <!-- Body overlay -->
                <div class="overlay" id="overlayy"></div>
            </div>
        </div>
    </header>
    <script>
    </script>