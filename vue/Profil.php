<style>
    body {
    background-image: url('vue/image/triangles.png');
  }
    
  .text-container {
  
  display: flex;
  justify-content: center;
  align-items: center;
}

.text-container h1{
  margin: 0;
  font-size: 80px;
  color: rgba(225,225,225, .01);
  background-image: url("vue/image/pixel.jpg");
  background-repeat: repeat;
  -webkit-background-clip:text;
  animation: animate 15s ease-in-out infinite;
  text-align: center;
  text-transform: uppercase;
  font-weight: 900;
}

  @keyframes animate {
    0%, 100% {
      background-position: left top;
    }
    25%{
      background-position: right bottom;
     }
    50% {
      background-position: left bottom;
    }
    75% {
      background-position: right top;
    }   
} 

</style>

<body>
<br><br>
  <div class="text-container">
    <h1>- PROFIL -</h1>
  </div>
  <br>

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
                            
                            <h3 class="fw-bold mb-2 text-uppercase">Voici vos informations :</h3>
                            <p class="mb-5"></p>

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
                                <button class="btn btn-primary btn-lg px-5" type="submit">--> Modifier vos informations <--</button>
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
</body>