<body>

    <h2 class="text-center py-3">Modifier un Stade</h2>
    <div class="row m-0 justify-content-center p-5">

        <div class="col-md-6 border rounded p-5">
            <form action="index.php?ctl=Organisateur&action=ModifierStade" method="POST">
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="nom_stade">Nom du stade</label>
                    <input class="col-6" id="nom_stade" name="nom_stade" type="text" placeholder="Saisir un nom" value="<?php echo($result['nom_stade']) ?>">
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="capacite">Capacité du stade</label>
                    <input class="col-6" id="capacite" name="capacite" type="number" placeholder="Saisir une capacité" value="<?php echo($result['capacite']) ?>">
                </div>

                <input type="hidden" name="id_stade" value="<?php echo($_GET['id_stade'])?>">
                

                <div class="text-center row m-0 py-3">
                    <input class="col-12" id="capacite" type="submit">
                </div>
                
            </form>
        </div>
    </div>
</body>