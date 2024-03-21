<body>
    <h2 class="text-center py-3">Créer un évènement</h2>
    <div class="row m-0 justify-content-center p-5">
        <div class="col-md-6 border rounded p-5">
            <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour </a>

            <form action="index.php?ctl=Organisateur&action=AjouterEvenement" method="POST">

                <!-- DATE -->
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="date_match">Date du match</label>
                    <input class="col-6" id="date_match" name="date_match" type="date" placeholder="Exemple: France" required>
                </div>

                <!-- EQUIPE 1 -->
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="id_equipe_1">Nom de l'équipe 1</label>
                    <select class="col-5" name="id_equipe_1" id="id_equipe_1">
                        <option value="">--Choisir une équipe--</option>
                        <?php
                            for ($i=0; $i < count($equipes); $i++) { 
                                echo '<option value='.$equipes[$i]['id_equipe'].'>'.$equipes[$i]['nom_equipe'].'</option>';
                            }
                        ?>
                    </select>
                </div>

                <!-- EQUIPE 2 -->
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="id_equipe_2">Nom de l'équipe 2</label>
                    <select class="col-5" name="id_equipe_2" id="id_equipe_2">
                        <option value="">--Choisir une équipe--</option>
                        <?php
                            for ($i=0; $i < count($equipes); $i++) { 
                                echo '<option value='.$equipes[$i]['id_equipe'].'>'.$equipes[$i]['nom_equipe'].'</option>';
                            }
                        ?>
                    </select>
                </div>

                <!-- STADE -->
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="id_stade">Stade</label>
                    <select class="col-5" name="id_stade" id="id_stade">
                        <option value="">--Choisir un stade--</option>
                        <?php
                            for ($i=0; $i < count($stades); $i++) { 
                                echo '<option value='.$stades[$i]['id_stade'].'>'.$stades[$i]['nom_stade'].'</option>';
                            }
                        ?>
                    </select>
                </div>

                <!-- SUBMIT -->
                <div class="text-center row m-0 py-3">
                    <input class="col-12" type="submit" value="Créer">
                </div>
                
            </form>

        </div>
    </div>


</body>