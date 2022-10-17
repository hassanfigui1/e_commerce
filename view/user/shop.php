

    <main>

<!-- BreadCrumb Start-->
<section class="breadcrumb-area mt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php/user/index">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Acheter</li>
                    </ol>
                </nav>
                <h5>Acheter</h5>
            </div>
        </div>
    </div>
</section>
<!-- BreadCrumb Start-->
<form class="search-wrapper-box" action="" method="POST">

<!-- Catagory Search Start -->
<section class="search">
    <div class="container">
        <div class="row justify-content-center">
            <div class="search-wrapper">
                    <input type="text" name="search"  value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>" placeholder="Saisir nom d'un produit.">                
            </div>
        </div>
    </div>
</section>
<!-- Catagory Search End -->

<!-- Catagory item start -->
<section class="categoryitem">
    <div class="container">
        <div class="row justify-content-center">
            <div class="categoryitem-wrapper">
                <div class="categoryitem-wrapper-itembox">
                    <h6>Categories</h6>
                    <select name="cat">
                        <?php 
                            foreach($catg as $data){

                        ?>
                        <option value="<?php echo $data['id_categorie'];?>" <?php if( $data['id_categorie']==$id) echo "selected";?>><?php echo $data['libelle'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="categoryitem-wrapper-itembox">
                    <h6>filltrer par</h6>
                    <select name="filtre">
                    <option value="sans"></option>
                        <option value="ordre_croissant">ordre croissant</option>
                        <option value="ordre_decroissant">ordre decroissant</option>
                    </select>
                </div>
                <div class="categoryitem-wrapper-price">

                </div>
                <div class="categoryitem-wrapper-itembox">
                <input type="submit" class="btn bg-primary"  value="Chercher">              

                </div>
            </div>
        </div>
    </div>
</section>
</form>
<!-- Catagory item End -->

<!-- Populer Product Strat -->
<section class="populerproduct bg-white p-0 shop-product">
    <div class="container">
        <div class="row">
            <?php
            foreach($prod as $data){
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-item">
                    <div class="product-item-image">
                        <a href="index.php/user/details?id_prod=<?php echo $data['id_prod'];?>"><img src="./asset_user/images/produits/<?php echo $data['image']; ?>" alt="Product Name"
                                class="img-fluid"></a>
                        <div class="cart-icon">
                           
                        </div>
                    </div>
                    <div class="product-item-info">
                        <a href="index.php/user/details?id_prod=<?php echo $data['id_prod'];?>"><?php echo $data['nom'];?></a>
                        <span><?php echo "$" .$data['prix'];?></span> <del>$<?php echo $data['prix'] + ($data['prix'] * 0.5);?></del>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Populer Product End -->

<!-- Pagination Start -->
<section class="pagination">
   
</section>
<!-- Pagination End -->

</main>
