<?php 
    $LesMatchs = [];
    $LesDates = [];
    $LesIdEvenement = [];
    $LesStades = [];

    for ($i=0; $i < count($LesBillets); $i++) {
        if (!in_array($LesBillets[$i]['nom_match'], $LesMatchs)) {
            array_push($LesMatchs, $LesBillets[$i]['nom_match']);
            array_push($LesDates, $LesBillets[$i]['date_match']);
            array_push($LesIdEvenement, $LesBillets[$i]['id_evenement']);
            array_push($LesStades, $LesBillets[$i]['nom_stade']);
        }
    }
?>

<section>

    <!-- Success achat de billets -->
    <?php 
    if (isset($_GET['success']) && $_GET['success']==1) {
        echo'
        <div class="alert alert-success alert-dismissible fade show m-5" role="alert">
            <strong>Achat validé !</strong> Le reçu a été envoyé à votre adresse mail.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    ?>
    <!-- Titre -->
    <div class="row m-0 text-center p-5 m-5">
        <h1>Mes Billets</h1>
    </div>

<?php

    if ($LesMatchs!=null) {
    echo'
    <div class="row m-0 justify-content-center">
        <div class="col-3 col-md-3 text-center">
            <h4>Match</h4>
        </div>
        <div class="col-3 col-md-3 text-center">
            <h4>Stade</h4>
        </div>
        <div class="col-3 col-md-3 text-center">
            <h4 class="d-none d-md-inline">Date du match</h4>
        </div>
        <div class="col-3 text-end pe-5">
            <h4 class="d-none d-md-inline">Télécharger les E-Billets</h4>
        </div>
        <div class="accordion" id="accordionExample">';
    
            
            for ($i=0; $i < count($LesMatchs); $i++) {
            $CollapseName="collapse".$i;
            echo'
                <div class="accordion-item shadow">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$CollapseName.'" aria-controls="'.$CollapseName.'">
                        <div class="col-3 text-start">
                            '.$LesMatchs[$i].'
                        </div>
                        <div class="col-3 text-center">
                            '.$LesStades[$i].'
                        </div>
                        <div class="col-3 text-center">
                            '.$LesDates[$i].'
                        </div>
                        <div class="col-2 text-end">
                            <a target="_blank" href="index.php?ctl=Utilisateur&action=GenererDesPdf&id_evenement='.$LesIdEvenement[$i].' "> <i class="bi bi-filetype-pdf fs-4"></i> </a>
                        </div>

                    </button>
                    </h2>
                    <div id="'.$CollapseName.'" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                ';
                            echo'
                            <div class="row text-center">
                                <div class="col-2 my-auto">
                                    Numéro de billet
                                </div>
                                <div class="col-3 my-auto">
                                    Date d’achat
                                </div>
                                <div class="col-2 my-auto">
                                     Prix
                                </div>
                                <div class="col-3 my-auto">
                                    Télécharger votre E-Billet
                                </div>
                                <div class="col-2 my-auto">
                                    Vendre
                                </div>
                            </div><hr>';

                            
                            

                            $InfoBillet = DbUtilisateur::GetInfoBillet($LesIdEvenement[$i],$_SESSION['id_utilisateur']);
                            for ($y=0; $y < count($InfoBillet); $y++) {
                                $is_check = ($InfoBillet[$y]['en_vente']==1) ? "checked" : "" ;
                                echo'
                                <div class="row text-center">
                                    <div class="col-2 my-auto">
                                    <span class="d-none d-md-inline"> Billet n° </span>  '.$InfoBillet[$y]['id_billet'].'
                                    </div>
                                    <div class="col-3 my-auto">
                                        <span class="d-none d-md-inline"> Acheté le </span> '.$InfoBillet[$y]['date_reservation'].'
                                    </div>
                                    <div class="col-2 my-auto">
                                        '.$InfoBillet[$y]['prix'].' €
                                    </div>
                                    <div class="col-3 form-check my-auto">
                                        <a target="_blank" href="index.php?ctl=Utilisateur&action=GenererUnPdf&id_billet='.$InfoBillet[$y]['id_billet'].' "> <i class="bi bi-filetype-pdf fs-4"></i> </a>
                                        
                                    </div>

                                    <div class="col-2 my-auto">
                                        <input type="checkbox" class="checkvente" data-id="'.$InfoBillet[$y]['id_billet'].'" '.$is_check.'>
                                    </div>
                                </div>';
                            }
                            
            echo'
                        </div>
                    </div>
                </div>
                ';
            }
    
        echo'
        </div>
        
    </div>';

    }else {
       echo'
       <div class="row m-0 justify-content-center">
            <div class="col-6 text-center">
                <h4>On dirait que vous n’avez pas encore acheté de billet...</h4>
            </div>
        </div>

        <div class="row m-0 justify-content-center mt-3">
            <div class="col-6 text-center">
                <h5>Achetez votre billet dès maintenant !</h5>
                <a href="index.php?ctl=Utilisateur&action=ListMatch" class="btn btn-outline-success mt-1">Acheter un billet</a>
            </div>  
        </div>
       ';
    }
    ?>
    
</section>

<script>
    // Sélectionnez toutes les checkboxes avec la classe "checkvente"
    var checkboxes = document.querySelectorAll(".checkvente");

    // Parcourez chaque checkbox et ajoutez un gestionnaire d'événement de changement
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            // Récupérer l'identifiant du billet à partir de l'attribut data-id
            var billetId = this.getAttribute("data-id");

            // Vérifier si la checkbox est cochée ou non
            var isChecked = this.checked;
            
            // Envoyer une requête AJAX au serveur avec l'identifiant du billet et l'état de la checkbox
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php?ctl=Utilisateur&action=Vendre", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("billetId=" + billetId + "&isChecked=" + isChecked); // Envoyer l'identifiant du billet et l'état de la checkbox au serveur
        });
    });
</script>