<section>
  <div class="text-center mt-5">
    <img src="https://www.ticketkosta.com/userfiles/catalog/cats/9702009ba11ea6cd873bd039e3989933.jpg" alt="foot img" style="height:20vh;">
  </div>

  <h1 class="my-5 p-5 text-center">Liste des matchs</h1>

  <div class="row m-0 my-5">
    <!-- CARDS -->
    <?php

    for ($i=0; $i < count($result); $i++) {
    $equipes = DbUtilisateur::list_equipes($result[$i]['id_evenement']);
    
    echo'
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <h4 class="card-title">'.$result[$i]['nom_match'].'</h4>';

                    if (isset($_SESSION['id_utilisateur'])) {
                        $ischecked = (DbUtilisateur::IsEvenementCheck($result[$i]['id_evenement'], $_SESSION['id_utilisateur']));
                        $checked = ($ischecked != null) ? "checked" : "" ;
                        echo'<p> Chercher des billets <input type="checkbox" class="checksearch pt-1" data-id="'.$result[$i]['id_evenement'].'" '.$checked.'> </p>';
                    }
                    
                    echo'
                    <p class="card-text">Équipes: 
                        <div class="equipe-container">
                            <img class="equipe-img" src="uploads/equipes/'.$equipes[0]['photo_equipe'].'" alt="Équipe A">
                            <span>'.$equipes[0]['nom_equipe'].'</span>
                        </div>
                        <span>-</span>
                        <div class="equipe-container">
                            <img class="equipe-img" src="uploads/equipes/'.$equipes[1]['photo_equipe'].'" alt="Équipe B">
                            <span>'.$equipes[1]['nom_equipe'].'</span>
                        </div>
                    </p>
                    <p class="card-text">Date: '.date('d/m/Y', strtotime($result[$i]['date_match'])).'</p>
                    <p class="card-text">Stade: '.$result[$i]['nom_stade'].'</p>
                </div>
                <a class="btn btn-primary m-2" href="index.php?ctl=Utilisateur&action=DetailMatch&evenement='.$result[$i]['id_evenement'].'">Acheter des billets</a>
            </div>
        </div>
        ';
    }?>
  </div>
</section>

<script>
    // Sélectionnez toutes les checkboxes avec la classe "checkvente"
    var checkboxes = document.querySelectorAll(".checksearch");

    // Parcourez chaque checkbox et ajoutez un gestionnaire d'événement de changement
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            // Récupérer l'identifiant du billet à partir de l'attribut data-id
            var EvenementId = this.getAttribute("data-id");

            // Vérifier si la checkbox est cochée ou non
            var isChecked = this.checked;
            
            // Envoyer une requête AJAX au serveur avec l'identifiant du billet et l'état de la checkbox
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php?ctl=Utilisateur&action=ChercherPlace", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("EvenementId=" + EvenementId + "&isChecked=" + isChecked); // Envoyer l'identifiant du billet et l'état de la checkbox au serveur
        });
    });
</script>