<body class="listmatch-bg">

  <div class="text-center mt-5">
    <img src="https://www.ticketkosta.com/userfiles/catalog/cats/9702009ba11ea6cd873bd039e3989933.jpg" alt="foot img" style="height:20vh;">
  </div>

  <h1 class="my-5 p-5 text-center">Liste des matchs</h1>

  <div class="row m-0 my-5">
    <!-- CARDS -->
    <?php
    for ($i=0; $i < count($result); $i++) {
    $equipes = DbUtilisateur::list_equipes($result[$i][0]);
    echo'
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <h4 class="card-title">'.$result[$i][1].'</h4>
                    <p class="card-text">Équipes: 
                        <div class="equipe-container">
                            <img class="equipe-img" src="uploads/equipes/'.$equipes[0]['photo_equipe'].'" alt="Équipe A">
                            <span>'.$equipes[0][0].'</span>
                        </div>
                        <span>-</span>
                        <div class="equipe-container">
                            <img class="equipe-img" src="uploads/equipes/'.$equipes[1]['photo_equipe'].'" alt="Équipe B">
                            <span>'.$equipes[1][0].'</span>
                        </div>
                    </p>
                    <p class="card-text">Date: '.date('d/m/Y', strtotime($result[$i]['date_match'])).'</p>
                    <p class="card-text">Stade: '.$result[$i][3].'</p>
                </div>
                <a class="btn btn-primary m-2" href="index.php?ctl=Utilisateur&action=DetailMatch&evenement='.$result[$i][0].'">Acheter des billets</a>
            </div>
        </div>
        ';
    }?>
  </div>

</body>