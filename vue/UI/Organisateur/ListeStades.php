<body>

    <div class="row m-0 p-5">

        <div class="text-center py-3">
            <a class="btn btn-primary" href="index.php?ctl=Organisateur&action=FormAjoutStade">Ajouter un stade</a>
        </div>

        <?php for ($i=0; $i < count($result); $i++) { 
            echo'
            <div class="row border py-2 my-2">
                <div class="col-md-4 text-center my-auto py-2">
                    '.$result[$i]['nom_stade'].'
                </div>
                <div class="col-md-4 text-center my-auto py-2">
                    '.$result[$i]['capacite'].' Personnes
                </div>
                <div class="col-md-4 text-center py-1 my-auto">
                    <a class="btn btn-info" href="index.php?ctl=Organisateur&action=FormModifierStade&id_stade='.$result[$i]['id_stade'].'">Modifier</a>
                    <a class="btn btn-danger" href="index.php?ctl=Organisateur&action=SupprimerStade&id_stade='.$result[$i]['id_stade'].'">Supprimer</a>
                </div>
            </div>
            ';
        } ?>
        
            
    </div>
</body>