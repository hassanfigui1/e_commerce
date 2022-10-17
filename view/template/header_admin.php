<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <base href="http://localhost/e_commerce/view/">
  <!-- plugins:css -->
  <link rel="stylesheet" href="./assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./assets/images/quest.png" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class=" " href="index.php/admin/index"><img src="./assets/images/bg.png" width="96px" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php/admin/index"><img src="./assets/images/quest.png" width="444px" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown me-1">
            
            <a href="index.php/admin/message">messages</a>
          </li>
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <?php 
                foreach($_SESSION['admin'] as $row){                
                ?>
                <img src="./assets/images/faces/<?php echo $row['image'];?>" alt="">
            <?php
              }?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a  href="index.php/admin/site" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Site
              </a>
              <a href="index.php/admin/logout" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Deconnecter
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php/admin/index">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Utilisateur</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php/admin/pages/utilisateur/add">ajouter un utilisateur</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php/admin/pages/utilisateur/List">utilisateurs</a></li>
              </ul>
            </div>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basi" aria-expanded="false" aria-controls="ui-basi">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">categorie</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php/admin/pages/categorie/add">ajouter une categorie</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php/admin/pages/categorie/List">categories</a></li>
              </ul>
            </div>
          </li><li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-bas" aria-expanded="false" aria-controls="ui-bas">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">produit</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-bas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php/admin/pages/produit/add">ajouter un produit</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php/admin/pages/produit/List">produits</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php/admin/pages/commande/List">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">commande</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php/admin/pages/avis/List">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Avis</span>
            </a>
          </li>
        </ul>
      </nav>
