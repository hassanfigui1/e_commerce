


    <main>
        <!-- Account-Login -->
        <section class="account-sign">
            <div class="container">
                <div class="row">
<div class="col-lg-6 col-md-12">
                        <div class="account-sign-up">
                            <h5 class="text-center">mes parametres</h5>
                            <form action="" method="post">
                                <?php
                                foreach($client as $row){
                                ?>
                            <div class="form__div">
                                 <center> <img src="./assets/images/faces/<?php echo $row['image']; ?>" alt="" width="100px"></center>  
                                </div>
                                <br><br>
                                <div class="form__div">
                                    <input type="text" name="nom" class="form__input" value="<?php echo $row['nom'];?>" required>
                                    <label for=""  class="form__label">Le nom:</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" name="prenom" class="form__input" value="<?php echo $row['prenom'];?>" required>
                                    <label for=""  class="form__label">Le prenom:</label>
                                </div>
                                <div class="form__div">
                                    <input type="email" name="mail" class="form__input" value="<?php echo $row['mail'];?>" required readonly>
                                    <label for=""  class="form__label">Email:</label>
                                </div>    
                                <div class="form__div">
                                    <input type="file" name="image" class="form__input"   required>
                                    <label for=""  class="form__label">Image:</label>
                                </div>
                                 <div class="form__div">
                                    <input type="text" name="tele" class="form__input"  value="<?php echo $row['tele'];?>" required>
                                    <label for=""  class="form__label">Tele:</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" name="ville" class="form__input"  value="<?php echo $row['ville'];?>" required>
                                    <label for=""  class="form__label">Ville:</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" name="adress" class="form__input" value="<?php echo $row['adress'];?>" required>
                                    <label for=""  class="form__label">L'adresse:</label>
                                </div>
                                <div class="form__div">
                                    <input type="password" name="password" class="form__input" >
                                    <label for=""   class="form__label">Le mot de passe:</label>
                                </div>
                                <div class="form__div mb-0">
                                    <input type="password" name="confirm_password" class="form__input" >
                                    <label for=""  class="form__label">Confirmer le mot de passe:</label>
                                </div>
                                <input type="submit" class="btn bg-primary" value="modifier">
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

