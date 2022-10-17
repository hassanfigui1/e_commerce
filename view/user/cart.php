

    <!-- BreadCrumb Start-->
    <section class="breadcrumb-area mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php/user/index">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Panier</li>
                        </ol>
                    </nav>
                    <h5>Panier</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- BreadCrumb Start-->
    <!-- Cart Area Start -->
    <section class="cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Dashboard-Nav  Start-->
                    <div class="dashboard-nav">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="cart.html" class="active">Mon panier</a></li>
                        </ul>
                    </div>
                    <!-- Dashboard-Nav  End-->
                </div>
            </div>
            <div class="rows">
                <div class="cart-items">
                    <div class="header">
                        <div class="image">
                            Image
                        </div>
                        <div class="name">
                            Nom
                        </div>
                        <div class="price">
                            Prix
                        </div>
                        
                        <div class="info">
                            Info
                        </div>
                    </div>
                    <div class="body">
                        
                            <?php
                            $sum=0;
                            foreach($add as $data){
                                $prod=get_produitById($data['id_prod']);
                                foreach($prod as $p){
                                    
                            ?>
                            <div class="item">
                            <div class="image">
                                <img src="./asset_user/images/produits/<?php echo $p['image'];?>">
                            </div>
                            <div class="name">
                                <div class="name-text">
                                    <p> <?php echo $p['nom'];?></p>
                                </div>
                                <div class="button">

                                    <a class="del" href="index.php/user/del?id_p=<?php echo $p['id_prod']; ?>">Supprimer</a>
                                </div>
                            </div>
                            <div class="price">
                                $<input name="prix_total" id="prix" value="<?php echo $data['prix_total']; $sum=$sum+$data['prix_total'];?>" readonly > <del>$<?php echo $p['prix'] + ($p['prix']*0.5);?></del>
                            </div>
                            <div class="rating">
                            </div>
                            <div class="info">
                                
                                <div class="quantity">
                                    <div class="product-pricelist-selector-quantity">
                                        <h6>quantity</h6>
                                        <div class="wan-spinner wan-spinner-4">
                                            
                                            <input type="text" id="valeur" value="<?php echo $data['qte_prod']; ?>" readonly>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <?php
                                }}
                                ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-price">
                        <h6>Effectuer vos commandes</h6>
                        <div class="card-price-list d-flex justify-content-between align-items-center">
                        <div class="item">
                                    <p><?php  foreach($items as $i) echo $i['quantite'];?> item</p>
                                </div>
                        </div>
                       
                        <div class="card-price-subtotal d-flex justify-content-between align-items-center">
                            <div class="total-text">
                                <p>Total Price</p>
                            </div>
                            <div class="total-price">
                                <p>$<?php echo $sum; $_SESSION['sum']=$sum;?></p>
                            </div>

                        </div>
                        <form action="#">
                            <a href="index.php/user/billing" class="btn bg-primary" type="submit" style="width: 100%;">Proceder Au Payement</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Area End -->

 <script>
     let val = document.getElementById("valeur");
     let max = document.getElementById("max");
     let min = document.getElementById("min");
     let prix = document.getElementById("prix");
     let prix_actual=prix.value;

     max.addEventListener("click", function(){
            count++;
            val.value= "" + count;
            prix.value= count*prix_actual;
});
min.addEventListener("click", function(){
            
            if(count>1){
                count--;
                val.value= "" +count;
                prix.value= count*prix_actual;
            }
});
</script>