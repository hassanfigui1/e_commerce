


    <main>
        <!-- Account-Login -->
        <section class="account-sign">
            <div class="container">
                <div class="row">
<div class="col-lg-6 col-md-12">
                        <div class="account-sign-up">
                            <h5 class="text-center">Sign up</h5>
                            <form action="" method="post">
                                <div class="form__div">
                                    <input type="text" name="nom" class="form__input" value="<?php echo $tableau[0]; ?>" required>
                                    <label for=""  class="form__label">Le nom:</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" name="prenom" value="<?php echo $tableau[1]; ?>" class="form__input" required>
                                    <label for=""  class="form__label">Le prenom:</label>
                                </div>
                                <div class="form__div">
                                    <input type="email" name="mail" value="<?php echo $tableau[2]; ?>" class="form__input" required>
                                    <label for=""  class="form__label">Email:</label>
                                </div>                               <div class="form__div">
                                    <input type="text" name="tele" value="<?php echo $tableau[3]; ?>" class="form__input" maxlength="10" required>
                                    <label for=""  class="form__label">Tele:</label>
                                </div>
                                <p class="erreur err_nom"></p>
                                <div class="form__div">
                                    <input type="text" name="ville" value="<?php echo $tableau[4]; ?>" class="form__input" required>
                                    <label for=""  class="form__label">Ville:</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" name="adress" value="<?php echo $tableau[5]; ?>" class="form__input" required>
                                    <label for=""  class="form__label">L'adresse:</label>
                                </div>
                                <div class="form__div">
                                    <input type="password" name="password" value="<?php echo $tableau[6]; ?>" class="form__input" required>
                                    <label for=""   class="form__label">Le mot de passe:</label>
                                </div>
                                <div class="form__div mb-0">
                                    <input type="password" name="confirm_password" value="<?php echo $tableau[7]; ?>" class="form__input" required >
                                    <label for=""  class="form__label">Confirmer le mot de passe:</label>
                                </div>
                                <input type="submit" class="btn bg-primary" value="s'inscrire">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
