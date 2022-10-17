
    <main>
        <!-- Account-Login -->
        <section class="account-sign">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="account-sign-in">
                            <h5 class="text-center">Sign in</h5>
                            <form action="" method="post">
                                <div class="form__div">
                                    <input type="email" name="mail" value="<?php echo $tableau[0]; ?>" class="form__input" required>
                                    <label for="" class="form__label">Email</label>
                                </div>
                                <div class="form__div mb-0">
                                    <input type="password" name="mdp" class="form__input" required >
                                    <label for="" class="form__label">Mot de passe</label>
                                </div>
                                <div class="password-info d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="password-info-right">
                                        <a href="index.php/user/formulaire">Mot de passe oublie?</a>
                                    </div>
                                </div>
                                <input type="submit" class="btn bg-primary" value="Se connecter"> 
                            </form>
                            <div class="social-signing">
                             <a href="index.php/user/account" class="btn bg-primary">Pas de compte? S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
