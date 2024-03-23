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

<section class="p-5" style="height:80vh">
    <!-- Titre -->
    <div class="row text-center p-5 m-5">
        <h1>Mes Billets</h1>
    </div>

<?php

    if ($LesMatchs!=null) {
    echo'
    <div class="row justify-content-center">
        <div class="col-3 text-start">
            <h4>Match</h4>
        </div>
        <div class="col-3 text-center">
            <h4>Stade</h4>
        </div>
        <div class="col-3 text-center">
            <h4>Date du match</h4>
        </div>
        <div class="col-3 text-end pe-5">
            <h4>Télécharger les E-Billets</h4>
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
                                <div class="col-3 my-auto">
                                    Numéro de billet
                                </div>
                                <div class="col-3 my-auto">
                                    Date d’achat
                                </div>
                                <div class="col-3 my-auto">
                                     Prix
                                </div>
                                <div class="col-3 my-auto">
                                    Télécharger votre E-Billet &nbsp
                                </div>
                            </div><hr>';

                            


                            $InfoBillet = DbUtilisateur::GetInfoBillet($LesIdEvenement[$i],$_SESSION['id_utilisateur']);
                            for ($y=0; $y < count($InfoBillet); $y++) {
                                
                                echo'
                                <div class="row text-center">
                                    <div class="col-3 my-auto">
                                        Billet n° '.$InfoBillet[$y]['id_billet'].'
                                    </div>
                                    <div class="col-3 my-auto">
                                        Acheté le '.$InfoBillet[$y]['date_reservation'].'
                                    </div>
                                    <div class="col-3 my-auto">
                                        '.$InfoBillet[$y]['prix'].' €
                                    </div>
                                    <div class="col-3 my-auto">
                                        <a target="_blank" href="index.php?ctl=Utilisateur&action=GenererUnPdf&id_billet='.$InfoBillet[$y]['id_billet'].' "> <i class="bi bi-filetype-pdf fs-4"></i> </a>
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
       <div class="row justify-content-center">
            <div class="col-6 text-center">
                <h4>On dirait que vous n’avez pas encore acheté de billet...</h4>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-6 text-center">
                <h5>Achetez votre billet dès maintenant !</h5>
                <a href="index.php?ctl=Utilisateur&action=ListMatch" class="btn btn-outline-success mt-1">Acheter un billet</a>
            </div>  
        </div>
       ';
    }
    ?>
    
</section>