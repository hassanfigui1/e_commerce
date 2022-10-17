
    <!-- Header Area End -->
    <main>
        <!--Banner Area Start -->
        <section class="banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="banner-area__content">
                            <h2>you <label style="color:blue;font-weight:bold;">DREAM</label></h2><h2> we <label style="color:green;font-weight:bold;" >PRODUCE.</label></h2>
                                <p style="color:red;font-weight:bold;">découvrir notre monde !</p>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="banner-area__img">
                            <img src="./asset_user/images/main.png" alt="banner-img" class="img-fluid">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!--Banner Area End -->

        <!-- Features Section Start -->
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Nos Produits</h2>
                        </div>
                    </div>
                </div>
                <div class="features-wrapper">
                    <div class="features-active">
                <?php
                foreach($produits as $row){
                ?>

                
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="index.php/user/details?id_prod=<?php echo $row['id_prod'];?>"><img src="./asset_user/images/produits/<?php echo $row['image'];?>" alt="Product Name"
                                        class="img-fluid"></a>
                                <div class="cart-icon">
                                    
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="index.php/user/details?id_prod=<?php echo $row['id_prod'];?>"><?php echo $row['nom'];?></a>
                                <span><?php echo "$" .$row['prix'];?></span> <del>$<?php echo $row['prix'] + ($row['prix'] * 0.5);?></del>
                            </div>
                        </div>
                      
                   
                    <?php
                       }
                       ?>
                    </div>
                    <div class="slider-arrows">
                        <div class="prev-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                    d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="next-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                                    d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                                    fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        <!-- Features Section End -->



     



        <!-- Categorys Section Start -->
        <section class="categorys">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Top categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                       <?php 
                       foreach($categories as $row1){
                       ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="card productcategory text-center">
                            <div class="productcategory-img">
                                <a href="index.php/user/shop?id_categorie=<?php echo $row1['id_categorie'];?>"></a>
                            </div>
                            <div class="card-body productcategory-text">
                                <a href="index.php/user/shop?id_categorie=<?php echo $row1['id_categorie'];?>">
                                    <h6 style="color:blue;"><?php echo $row1['libelle'];?></h6>
                                    <span>
                                    <?php
                                    $produ=get_count_product($row1['id_categorie']);
                                  $count=0;
                                 foreach($produ as $p){$count++;}
                                   echo $count . " Produits";
                                ?>    

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>
               
            </div>
        </section>
        <!-- Categorys Section End -->

       
    </main>

    