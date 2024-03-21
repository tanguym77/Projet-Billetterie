<body>

    <div class="row m-0 p-5">

        <div class="text-center py-3">
            <a class="btn btn-primary" href="index.php?ctl=Organisateur&action=FormAjoutEquipe">Ajouter une équipe</a>
        </div>

        

        <?php for ($i=0; $i < count($result); $i++) { 
            echo'
            <div class="row border py-2 my-2">
                <div class="col-md-4 text-center my-auto py-2">';
                    if ($result[$i]['photo_equipe'] != '') {
                        echo'<img class="img-fluid" style="height: 100px;" src="uploads/equipes/'.$result[$i]['photo_equipe'].'">';
                    }else {
                        echo'<img class="img-fluid" style="height: 100px;" src="vue/image/user.png">';
                    }
            echo'
                </div>
                <div class="col-md-4 text-center my-auto py-2">
                    '.$result[$i]['nom_equipe'].'
                </div>
                <div class="col-md-4 text-center py-1 my-auto">
                    <a class="btn btn-info" href="index.php?ctl=Organisateur&action=FormModifierEquipe&id_equipe='.$result[$i]['id_equipe'].'">Modifier</a>
                    <a class="btn btn-danger" href="index.php?ctl=Organisateur&action=SupprimerEquipe&id_equipe='.$result[$i]['id_equipe'].'">Supprimer</a>
                </div>
            </div>
            ';
        } ?>
        
            
    </div>
</body>