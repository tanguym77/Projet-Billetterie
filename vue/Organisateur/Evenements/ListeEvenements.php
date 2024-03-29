<style>
    .card {
        background-image: url('vue/image/fondblanc.jpg');
        background-size: cover;
        max-width: 300px; /* Définir la largeur maximale des billets */
        margin: 0 auto; /* Centrer les billets */
    }
    .equipe-img {
        max-width: 50px;
        max-height: 50px;
        margin-right: 10px;
    }
    .equipe-container {
        display: flex;
        align-items: center;
    }
</style>

<div class="container">
    <h1 class="my-4 text-center">Matchs de football - Billets</h1>

    <div class="text-center py-3">
        <a class="btn btn-info col-3" href="index.php?ctl=Organisateur&action=CreerEvenement">Créer un match</a>
    </div>

    <div class="row">
        <!-- CARDS -->
        <?php
        for ($i=0; $i < count($result); $i++) {
        $equipes = DbOrganisateur::list_equipes($result[$i][0]);
        echo'
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">'.$result[$i]['nom_match'].'</h4>
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
                        <p class="card-text">Date: '.$result[$i]['date_match'].'</p>
                        <p class="card-text">Stade: '.$result[$i]['nom_stade'].'</p>
                        <a class="btn btn-primary" href="index.php?ctl=Organisateur&action=FormModifierEvenement&id_evenement='.$result[$i]['id_evenement'].'" >Modifier</a>
                        <a class="btn btn-danger"  href="index.php?ctl=Organisateur&action=SupprimerEvenement&id_evenement='.$result[$i]['id_evenement'].'" >Supprimer</a>
                    </div>
                </div>
            </div>
            ';
        }
        ?>
</div>

<!-- Bootstrap JS and jQuery (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
