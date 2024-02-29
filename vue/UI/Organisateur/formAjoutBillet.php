
<body class="h-100">

<div class="row d-flex justify-content-center m-0 align-items-center">
    <div class="col-md-8 bg-light border rounded shadow p-3 m-3 mb-5">
        <!-- Button retour -->
        <a href="index.php?ctl=Gestionnaire&action=Accueil&num_talent=0" class="btn btn-primary my-auto"><i class="bi bi-arrow-left-circle-fill"></i>&nbsp Retour</a>
        
        <!-- FORMULAIRE -->
        <form action="index.php?ctl=Gestionnaire&action=NewTalent&num_talent=0" method="post" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">
                <div class="col-4 mt-1 d-flex justify-content-center">
                    <label for="file-input">
                        <img src="./images/user.png" class="rounded-pill img-fluid" id="upfile" style="cursor:pointer;"></img>
                    </label>
                    <input type="file" name="Photo_profil" style="display : none;" id="file-input" onchange="previewPicture(this)" ></input>
                </div>
            </div>
            <h4 class="text-center ">Choisir une image :</h4> 

            <!-- MENU -->
            <div class="nav nav-tabs d-flex justify-content-around mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Informations</button>
                    <button class="nav-link" id="v-pills-physique-tab" data-bs-toggle="pill" data-bs-target="#v-pills-physique" type="button" role="tab" aria-controls="v-pills-physique" aria-selected="false">Physique</button>
                    <button class="nav-link" id="v-pills-vetements-tab" data-bs-toggle="pill" data-bs-target="#v-pills-vetements" type="button" role="tab" aria-controls="v-pills-vetements" aria-selected="false">Vêtements</button>
                    <button class="nav-link" id="v-pills-reseaux-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reseaux" type="button" role="tab" aria-controls="v-pills-reseaux" aria-selected="false">Réseaux</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Commentaires</button>
                </div>

            <div class="mt-4 mb-5">
                <div class="tab-content" id="v-pills-tabContent">

                    <!-- TAB HOME -->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <label>Informations personnelles :</label>
                        <div class="row m-0 mb-3 border border-2 rounded p-2">
                            <!-- NOM -->
                            <div class="col-md-6 p-1">
                                <label>Nom :</label>
                                <input name="Nom" id="Nom" class="p-2 form-control" type="text" placeholder="Nom" required>
                            </div>
                            <!-- PRENOM -->
                            <div class="col-md-6 p-1">
                                <label>Prénom :</label>
                                <input name="Prenom" id="Prenom" class="p-2 form-control" type="text" placeholder="Prenom" required>
                            </div>
                            <!-- TELEPHONE -->
                            <div class="col-md-6 p-1">
                                <label>Téléphone :</label>
                                <input type='tel' id='Telephone' name='Telephone' pattern='[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}' class='p-2 form-control' placeholder='06 00 00 00 00'>
                            </div>
                            <!-- MAIL -->
                            <div class="col-md-6 p-1">
                                <label>Email :</label>
                                <input name="Email" id="Email" class="p-2 form-control" type="text" placeholder="Email">
                            </div>
                            <!-- DATE DE NAISSANCE -->
                            <label class=" p-0 mt-1">Date de naissance :</label>
                            <input name="Date_naissance" type="date" class="p-2 form-control">
                        </div>

                        <label>Coordonnées :</label>
                        <div class="row m-0 mb-2 border border-2 rounded p-2">
                            <div class="col-md-12 p-1">
                                <!-- RUE -->
                                <label>Rue :</label>
                                <input name="Rue" id="Rue" class="p-2 form-control" type="text" placeholder="Rue">
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- CODE POSTAL -->
                                <label>Code postal :</label>
                                <input name="Code_postal" id="Code_postal" class="p-2 form-control" type="text" placeholder="Code postal">
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- VILLE -->
                                <label>Ville :</label>
                                <input name="Ville" id="Ville" class="p-2 form-control" type="text" placeholder="Ville">
                            </div>
                        </div>
                    </div>


                    <!-- TAB PHSIQUE -->
                    <div class="tab-pane fade show" id="v-pills-physique" role="tabpanel" aria-labelledby="v-pills-physique-tab">
                        <div class="row m-0 mb-2">
                            <div class="col-md-6 p-1">
                                <!-- TAILLE -->
                                <label>Taille (en cm) :</label>
                                <input name="Taille" id="Taille" class="p-2 form-control" type="text" placeholder="Taille (en cm)">
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- POID -->
                                <label>Poids (en kg) :</label>
                                <input name="Poids" id="Poids" class="p-2 form-control" type="text" placeholder="Poids (en kg)">
                            </div>
                        </div>
                        <div class="row m-0 mb-2">
                            <div class="col-md-6 p-1">
                                <!-- Longueur_cheveux -->
                                <label>Longueur des cheveux :</label>
                                <select name="Longueur_cheveux" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Choisir</option>
                                    <option disabled>──────────</option>
                                    <option value="Chauve">Chauve</option>
                                    <option value="Court">Court</option>
                                    <option value="Long">Long</option>
                                    <option value="Mi-long">Mi-long</option>
                                    <option value="Rasé">Rasé</option>
                                    <option value="Très long">Très long</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- Couleur_cheveux -->
                                <label>Couleur des cheveux :</label>
                                <select name="Couleur_cheveux" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Choisir</option>
                                    <option disabled>──────────</option>
                                    <option value="Blond">Blond</option>
                                    <option value="Blond vénitien">Blond vénitien</option>
                                    <option value="Brun">Brun</option>
                                    <option value="Châtain">Châtain</option>
                                    <option value="Poivre et sel">Poivre et sel</option>
                                    <option value="Roux">Roux</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="row m-0 mb-2">
                            <div class="col-md-6 p-1">
                                <!-- Couleur_yeux -->
                                <label>Couleur des yeux :</label>
                                <select name="Couleur_yeux" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Choisir</option>
                                    <option disabled>──────────</option>
                                    <option value="Marron">Marron</option>
                                    <option value="Vert">Vert</option>
                                    <option value="Bleu">Bleu</option>
                                    <option value="Gris">Gris</option>
                                    <option value="Noir">Noir</option>
                                    <option value="Vairon">Vairon</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- Nom_origine -->
                                <label>Origines :</label>
                                <select name="Nom_origine" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Choisir</option>
                                    <option disabled>──────────</option>
                                    <option value="Caucasien">Caucasien</option>
                                    <option value="Asiatique">Asiatique</option>
                                    <option value="Latino">Latino</option>
                                    <option value="Africain">Africain</option>
                                    <option value="Metis">Metis</option>
                                    <option value="Eurasien">Eurasien</option>
                                    <option value="Maghrébin">Maghrébin</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="row m-0 mb-2">
                            <div class="col-md-6 p-1">
                                <!-- Nom_nationalite -->
                                <label>Nationalité :</label>
                                <select name="Nom_nationalite" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Choisir</option>
                                    <option disabled>──────────</option>
                                    <option value="Française">Française</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- Nom_genre -->
                                <label>Genre :</label>
                                <select name="Nom_genre" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Choisir</option>
                                    <option disabled>──────────</option>
                                    <option value="Féminin">Féminin</option>
                                    <option value="Masculin">Masculin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- TAB VETEMENTS -->
                    <div class="tab-pane fade show" id="v-pills-vetements" role="tabpanel" aria-labelledby="v-pills-vetements-tab">
                        <div class="row m-0 mb-2">
                            <div class="col-md-6 p-1">
                                <!-- TAILLE VESTE-->
                                <label>Taille de veste :</label>
                                <input name="Taille_veste" id="Taille_veste" class="p-2 form-control" type="text" placeholder="Taille de veste">
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- TAILLE PANTALON -->
                                <label>Taille de pantalon :</label>
                                <input name="Taille_pantalon" id="Taille_pantalon" class="p-2 form-control" type="text" placeholder="Taille de pantalon">
                            </div>
                            <div class="col-md-6 p-1">
                                <!-- POINTURE -->
                                <label>Taille pointure :</label>
                                <input name="Pointure" id="Pointure" class="p-2 form-control" type="text" placeholder="Pointure">
                            </div>
                        </div>
                        
                    </div>

                    <!-- TAB RESEAUX -->
                    <div class="tab-pane fade" id="v-pills-reseaux" role="tabpanel" aria-labelledby="v-pills-reseaux-tab">
                        <div class="row m-0 mb-2">
                            <div class="col-md-12 p-1">
                                <!-- Instagram -->
                                <label>Profil Instagram :</label>
                                <input name="Instagram" id="Instagram" class="p-2 form-control" type="text" placeholder="Instagram">
                            </div>
                            
                            <div class="col-md-12 p-1">
                                <!-- Facebook -->
                                <label>Profil Facebook :</label>
                                <input name="Facebook" id="Facebook" class="p-2 form-control" type="text" placeholder="Facebook">
                            </div>
                            
                        </div>
                    </div>
                    <!-- TAB MESSAGE -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row m-0 mb-2">
                            <!-- Commentaire -->
                            <label>Veuillez saisir vos remarques :</label>
                            <textarea name="Commentaire" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Button SUBMIT -->
        <input value="Créer un talent" class="form-control btn btn-light border" type="submit">

        </form>
    </div>
</div>



<script>
let previewPicture  = function (e) {

    // e.files contient un objet FileList
    const [file] = e.files

    // on change l'url de l'image
    document.getElementById("upfile").src = URL.createObjectURL(file)
}
</script>

</body>