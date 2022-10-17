<main>
        <!--Breadcrumb Area Start -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php/user/index">Accueil</a></li>
                                <li class="breadcrumb-item" aria-current="page">Categories</li>
                                <li class="breadcrumb-item" aria-current="page">Produit</li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                        <h5>Detail</h5>
                    </div>
                </div>
            </div>
        </section>
        <?php if(isset($_SESSION['msg1'])){
            echo $_SESSION['msg1'];
            unset($_SESSION['msg1']);
        }?>
        <!--Breadcrumb Area End -->
        <form action="index.php/user/add_cart?id=<?php echo $id;?>" method="post">
        <!-- Product Details Area Start -->
        <section class="product">
            <div class="container">
                <div class="row">
                
                <?php 
                    foreach ($detail as $data) {
                        $id=$data['id_prod'];
                    ?>
                <div class="col-lg-6 col-md-5 col-12">
                        <div class="product-slider">
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        <li><img src="./asset_user/images/produits/<?php echo $data['image'];?>" /></li>
                                    
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 col-md-7 col-12">
                        <div class="product-pricelist">
                            <h2><?php echo $data['nom'];?></h2>
                            <div class="product-pricelist-ratting">
                                <div class="price">
                                    $<input name="prix_total"  class="form-control"  id="prix" value="<?php echo $data['prix'];?>" readonly> <del>$<?php echo $data['prix'] + ($data['prix'] * 0.5);?></del>
                                </div>
                                <div class="star">
                                    
                                </div>
                            </div>
                            <div class="product-pricelist-selector">
                                <div class="product-pricelist-selector-size">
                                    
                                </div>
                                    <div class="product-pricelist-selector-quantity">
                                        <h6>quantity</h6>
                                        <div class="wan-spinner wan-spinner-4">
                                            <a href="javascript:void(0)" class="minus" >
                                                <button id="min" type="button">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="11.98" height="6.69"
                                                    viewBox="0 0 11.98 6.69">
                                                    <path id="Arrow" d="M1474.286,26.4l5,5,5-5"
                                                        transform="translate(-1473.296 -25.41)" fill="none"
                                                        stroke="#989ba7" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.4" />
                                                </svg>
                                                </button>
                                            </a>
                                            <input type="text" id="valeur" value="1" name="quantity" readonly>
                                            <a href="javascript:void(0)" class="plus" ><button type="button" id="max"><svg 
                                                    xmlns="http://www.w3.org/2000/svg" width="11.98" height="6.69"
                                                    viewBox="0 0 11.98 6.69">
                                                    <g id="Arrow" transform="translate(10.99 5.7) rotate(180)">
                                                        <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l5,5,5-5"
                                                            transform="translate(-1474.286 -26.4)" fill="none"
                                                            stroke="#1a2224" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.4" />
                                                    </g>
                                                </svg></button></a>
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="product-pricelist-selector-button">
                                <button  class="btn cart-bg" type="submit"><i class="fa fa-cart-plus">Ajouter au panier</i>    <!--////////////////submit-->
                                </button>
                               
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
        </section>
        <!-- Product Details Area End -->
        </form>
        <center><h3>LES AVIS</h3></center>
        <div class="mt-5" id="review_content">
            <?php  foreach($avis as $a)
	{
        $clt=get_clientById($a["id_clt"]);
        foreach($clt as $c){
            $user=$c["nom"];
            $image=$c["image"];
        }
    ?>
                <span hidden id="etoile<?php echo $a['id_avis'];?>"><?php echo $a['etoile'];?></span>

            <div class="row mb-3">

        <div class="col-sm-1"><img src="./assets/images/faces/<?php echo $image;?>" alt=""></div>

        <div class="col-sm-11">

        <div class="card">

        <div class="card-header"><b><?php echo $user;?></b></div>

<div class="card-body">

<span id="aviss<?php echo $a['id_avis'];?>"></span>
<script>

    var etoile= $('#etoile<?php echo $a['id_avis'];?>').text();
   
    var html='';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(etoile >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }
                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        $('#aviss<?php echo $a['id_avis'];?>').html(html);
    

</script>



<br />

<?php echo $a['avis'];?>
</div>

<div class="card-footer text-right"><?php echo $a['date'];?></div>

</div>

</div>

</div>

    <?php } ?>
        </div>

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
                                <span><?php echo "$".$row['prix'];?></span> <del>$<?php echo $row['prix'] + ($row['prix']*0.5);?></del>
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
        
    </main>

    <script>
     let val = document.getElementById("valeur");
     let max = document.getElementById("max");
     let min = document.getElementById("min");
     let prix = document.getElementById("prix");
     let prix_actual=prix.value;
     let count = 1;
     max.addEventListener("click", function(){
            count++;
            val.value= "" + count;
            prix.value= (count*prix_actual).toFixed(2);
});
min.addEventListener("click", function(){
            
            if(count>1){
                count--;
                val.value= "" +count;
                prix.value= (count*prix_actual).toFixed(2);
            }
});
 </script>

<script>
   var element = document.getElementsByClassName("hh");
   
   element[0].addEventListener("click", function(){
    element[0].classList.add("active");
});

</script>
         
