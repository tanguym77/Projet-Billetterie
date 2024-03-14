<style>
    .gradient {
        z-index: 1;
        background: linear-gradient(-45deg, yellow, orange, red);
        background-size: 400% 400%;
        width: 100%;
        height: 100vh;
        animation: animate 10s ease infinite;
    }
    
    @keyframes animate {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
</style>

<!-- FORM profil -->
<section class="d-flex align-items-center gradient">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              
              <!-- BOUTON RETOUR -->
              <a href="./index.php" class="btn btn-light mb-3 shadow"><i class="bi bi-arrow-left-circle-fill"></i>&nbsp Retour</a>
                
                <div class="card bg-light border-2 shadow" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mt-md-1 m-auto">
                            
                            <h2 class="fw-bold mb-2 text-uppercase">Profils</h2>
                            <p class="mb-5">Voici votre profil :</p>

                            <!-- FORM -->
                            <form action="./index.php?ctl=Connexion&action=ChangeProfil" method="post">
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="nom" class="form-control form-control-lg" value=<?php echo($_SESSION['nom'])?> required/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="prenom" class="form-control form-control-lg" value=<?php echo($_SESSION['prenom'])?> required/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" value=<?php echo($_SESSION['mail'])?> required/>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="entrer votre mot de passe" required/>
                                </div>
                                    <!-- <p class="small mb-3 pb-lg-2"><a href="#!">Mot de passe oublié ?</a></p> -->
                                <button class="btn btn-primary btn-lg px-5" type="submit">changer information</button>
                            </form>
                            <!-- Message erreur -->
                            <?php
                                if(isset($_GET['msg'])){
                                    echo "<div class='mt-3 bg-danger rounded p-2'>".$_GET['msg']."</div>";
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>