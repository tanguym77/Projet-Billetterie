<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        .btn-retour {
            margin-bottom: 10px;
        }

        .content {
            margin-top: 10px;
        }
    </style>
<body>

<div class="container">
    <center>
        <div class="btn-retour mt-2">
            <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour</a>
        </div>
    </center>
    
    <h2 class="my-4 text-center">Stades de football</h2>

    <div class="text-center py-3">
        <a class="btn btn-primary" href="index.php?ctl=Organisateur&action=FormAjoutStade">Ajouter un stade</a>
    </div>

    <div class="content">
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
</div>

</body>