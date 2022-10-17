<?php
    $id_cmd= $_GET['id_cmd'];
    $date_cmd = $_GET['date_cmd'];
    $etat_cmd = $_GET['etat_cmd'];
    $total = $_GET['total'];

    $get_lign_cmdById = get_lign_cmdById($id_cmd);
    $get_produitById = get_produitById($get_lign_cmdById[0]['id_prod']);
    $titreProduit = $get_produitById[0]['nom'];
    $img_prod = $get_produitById[0]['image'];
?>
    <main>
        <section class="account-sign">
            <div class="container">
                <div class="row">
                    <section class="col-lg-8">
                        <div class=" ">
                            <div class="row justify-content-center ">
                            <div class="col-md-12 ">
                                <div class="card shadow-0 border ">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 ">
                                        <div class="bg-image hover-zoom  ">
                                        <img src="./asset_user/images/produits/<?php echo $img_prod ?>" alt="hello" class="w-100" />
                                        <a href="#!">
                                            <div class="hover-overlay">
                                            <div class="mask"></div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 ">
                                        <h5 > <?php echo $titreProduit ?></h5>
                                        <div class="d-flex flex-row">
                                        <div class="text-danger mb-1 me-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>310</span>
                                        </div>
                                        <div class="mt-1 mb-0 ">
                                        <span></span>
                                        <span class="font-weight"> Commandé le : </span>
                                        <span><?php echo $date_cmd; ?><br /></span>
                                        </div>
                                        <p class="text-primary ">
                                            
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3  ">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">$<?php echo $total.".00" ?></h4>&nbsp;
                                        <span class="text-danger">  <s>$<?php echo $total*2.347 ?></s></span>
                                        </div>
                                        <h6 class=""><i >Etat du commande : </i> <label class="text-success"><?php echo $etat_cmd ?></label> </h6>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
								
								<?php  if(isset($_SESSION['client'])){
    
									foreach($_SESSION['client'] as $clt){
										$id_clt=$clt['id_clt'];
									}  
									} 
								?>
                                <form action="" method="post">
								<div class="">
									<input type="hidden" name="id_cmd" class=""  value="<?php echo $_GET['id_cmd'];?>" >
                                </div>
                                <div class="">
                                    <input type="hidden" name="id_clt" class=""  value="<?php echo $id_clt;?>" required readonly>
                                </div>

                                <?php foreach($_SESSION['client'] as $clt){
                                    $mail=$clt['mail'];
                                }?>
                                <div class="form__div">
                                    <input type="email" name="mail" class="form__input"  value="<?php echo $mail;?>" required readonly>
                                    <label for="" class="form__label">Email</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" name="subject" class="form__input"  value="" required >
                                    <label for="" class="form__label">Sujet</label>
                                </div>

                                <div class="form__div ">
                                    <textarea class="form-control" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                                </div>
                                 <div class="form__div ">
								 
                                <input type="submit" class="btn bg-primary" value="Envoyer"> 
                                </div>
                            </form>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                        </div>
                        </section>
                </div>
            </div>
        </section>
    </main>










