
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Gestionnaire d'application</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card" >
                <div class="card-body" onclick="location.href='index.php/admin/pages/commande/List'">
                  <p class="card-title text-md-center text-xl-left">Commandes</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                      include_once('../php_requete/connexion.php');
                      $con_bd=conn_sql();
                      $stmt = $con_bd->query("SELECT * FROM commande");
                                  // execute the query
                                  $count=0;
                                  while($row = $stmt->fetch()){$count++;}
                                   echo $count;
                    ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"  onclick="location.href='index.php/admin/pages/utilisateur/List'">
                  <p class="card-title text-md-center text-xl-left">Utilisateurs</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                      $stmt = $con_bd->query("SELECT * FROM client");
                                  // execute the query
                                $count=0;
                                while($row = $stmt->fetch()){$count++;}
                                 echo $count;
                    ?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"  onclick="location.href='index.php/admin/pages/categorie/List'">
                  <p class="card-title text-md-center text-xl-left">Categories</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                      $stmt = $con_bd->query("SELECT * FROM categorie");
                                  // execute the query
              
                                  $count=0;
                                while($row = $stmt->fetch()){$count++;}
                                 echo $count;
                    ?></h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"  onclick="location.href='index.php/admin/pages/produit/List'">
                  <p class="card-title text-md-center text-xl-left">Produits</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                      $stmt = $con_bd->query("SELECT * FROM produit");
                                  // execute the query
              
                                  $count=0;
                                  while($row = $stmt->fetch()){$count++;}
                                   echo $count;
                    ?></h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
          </div>
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        