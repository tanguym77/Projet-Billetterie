<body class="listmatch-bg">

  <!-- Animation Camion -->
  <div class="loop-wrapper my-5">
    <div class="mountain"></div>
    <div class="hill"></div>
    <div class="tree"></div>
    <div class="tree"></div>
    <div class="tree"></div>
    <div class="rock"></div>
    <div class="truck"></div>
    <div class="wheels"></div>
  </div> 

  <i class="fa fa-list-alt" aria-hidden="true"></i><h1 class="my-5 p-5 text-center">Listes des matchs</h1>

  <div class="row m-0 my-5">
    <!-- CARDS -->
    <?php
    for ($i=0; $i < count($result); $i++) {
    $equipes = DbUtilisateur::list_equipes($result[$i][0]);
    echo'
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">'.$result[$i][1].'</h4>
                    <p class="card-text">Équipes: 
                        <div class="equipe-container">
                            <img class="equipe-img" src="uploads/equipes/'.$equipes[0][0].'.png" alt="Équipe A">
                            <span>'.$equipes[0][0].'</span>
                        </div>
                        <span>-</span>
                        <div class="equipe-container">
                            <img class="equipe-img" src="uploads/equipes/'.$equipes[1][0].'.png" alt="Équipe B">
                            <span>'.$equipes[1][0].'</span>
                        </div>
                    </p>
                    <p class="card-text">Date: '.$result[$i][2].'</p>
                    <p class="card-text">Stade: '.$result[$i][3].'</p>
                </div>
                <a class="btn btn-primary m-2" href="index.php?ctl=Utilisateur&action=DetailMatch&evenement='.$result[$i][0].'">Réserver</a>
            </div>
        </div>
        ';
    }?>
  </div>

</body>