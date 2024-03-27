<section>
    <h1 class="text-center my-5">Achat de billets</h1>

    <div class="row m-0 my-5 justify-content-center">
        <div class="col-md-6 p-5">
            <div class="accordion rounded shadow" id="accordionPanelsStayOpenExample">
                <!-- Mode de paiement -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <div class="col-7">
                            Informations Personnelles
                        </div>
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body text-center">
                        <!-- NOM -->
                        <div class="form-floating mb-3">
                            <input type="nom" name="nom" class="form-control" id="floatingInput1" value="<?php echo($_SESSION['nom']) ?>" disabled>
                            <label for="floatingInput1">Nom</label>
                        </div>

                        <!-- PRENOM -->
                        <div class="form-floating mb-3">
                            <input type="prenom" name="prenom" class="form-control" id="floatingInput2" value="<?php echo($_SESSION['prenom']) ?>" disabled>
                            <label for="floatingInput2">Prenom</label>
                        </div>

                        <!-- Mail -->
                        <div class="form-floating mb-3">
                            <input type="mail" name="mail" class="form-control" id="floatingInput3" value="<?php echo($_SESSION['mail']) ?>" disabled>
                            <label for="floatingInput3">Email</label>
                        </div>

                    </div>
                    </div>
                </div>

                <!-- Paypal -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <div class="col-5">
                            Paiement Paypal
                        </div>
                        <div class="col-6 text-end">
                            <img src="https://i.imgur.com/7kQEsHU.png" style="height: 30px;">
                        </div>
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <!-- mail paypal -->
                            <div class="form-floating mb-3">
                                <input type="mail" name="paypal" class="form-control" id="floatingInput">
                                <label for="floatingInput">Paypal Email</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte de crédit -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        <div class="col-5">
                            Paiement Carte
                        </div>
                        <div class="col-6 text-end">
                            <img src="https://i.imgur.com/2ISgYja.png" style="height: 30px;">
                            <img src="https://i.imgur.com/W1vtnOV.png" style="height: 30px;">
                            <img src="https://i.imgur.com/35tC99g.png" style="height: 30px;">
                            <img src="https://i.imgur.com/2ISgYja.png" style="height: 30px;">
                        </div>
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <!-- Carte Bancaire -->
                            <div class="mb-3">
                                <label>Carte :</label>
                                <input type="text" name="carte" class="form-control" placeholder="0000 0000 0000 0000">
                            </div>

                            <!-- Carte expiration -->
                            <div class="mb-3">
                                <label>Date d'expiration :</label>
                                <input type="date" name="carte_expiration" class="form-control">
                            </div>

                            <!-- CCV -->
                            <div class="mb-3">
                                <label>CCV :</label>
                                <input type="text" name="carte" class="form-control" placeholder="000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RECAP -->
<section>
    <div class="row m-0 justify-content-center">
        <div class="col-md-6 px-5">
            <div class="border rounded p-3 shadow">
                <?php 
                    // Initialisation
                    $prix = $_POST['prix'];
                    $nb_billets = $_POST['nb_billets'];
                    
                ?>
                <h3>Récapitulatif de la commande :</h3>
                <p>Match : <?php echo($_POST['nom_match'])?></p>
                <p> <?php echo($_POST['nom_stade'])?> </p>
                <p>Catégorie : <?php echo($_POST['libelle_zone'])?></p>
                <p>Date : <?php echo(date('d/m/Y', strtotime($_POST['date_match'])))?></p>

                <hr>
                <!-- Prix HT Unitaire -->
                <div class="row m-0">
                    <div class="col-6">
                        <p>Prix Unitaire (HT)</p>
                    </div>
                    <div class="col-6 text-end">
                        <p><?php echo($prix) ?> €</p>
                    </div>
                </div>
                <!-- Quantité -->
                <div class="row m-0">
                    <div class="col-6">
                        <p>Quantité</p>
                    </div>
                    <div class="col-6 text-end">
                        <p><?php echo($nb_billets) ?></p>
                    </div>
                </div>
                <!-- TVA -->
                <div class="row m-0">
                    <div class="col-6">
                        <p>TVA 5,5%</p>
                    </div>
                    <div class="col-6 text-end">
                        <p><?php echo(round( ($prix*$nb_billets) * 0.055 ) ) ?> €</p>
                    </div>
                </div>
                <!-- TOTAL -->
                <div class="row m-0">
                    <div class="col-6">
                        <p>Total à payer (TTC)</p>
                    </div>
                    <div class="col-6 text-end">
                        <p><?php echo(round( ($prix*$nb_billets) * 1.055)) ?> €</p>
                    </div>
                </div>

                <hr>

                <!-- PAYER -->
                <div class="row m-0 justify-content-between mt-4">
                    <div class="col-md-6 text-center">
                    <a href="javascript:history.go(-1)" class="btn btn-secondary px-5">Annuler</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <form action="index.php?ctl=Utilisateur&action=Payer" method="post">
                            <input type="hidden" name="id_evenement" value="<?php echo($_POST['evenement'])?>">
                            <input type="hidden" name="id_zone" value="<?php echo($_POST['id_zone'])?>">

                            <!-- Info pour le mail -->
                            <input type="hidden" name="nom_match" value="<?php echo($_POST['nom_match']) ?>">
                            <input type="hidden" name="libelle_zone" value="<?php echo($_POST['libelle_zone']) ?>">
                            <input type="hidden" name="date_match" value="<?php echo(date('d/m/Y', strtotime($_POST['date_match']))) ?>">
                            <input type="hidden" name="prix" value="<?php echo(round( ($prix*$nb_billets) * 1.055)) ?>">
                            <input type="hidden" name="nom_stade" value="<?php echo($_POST['nom_stade']) ?>">
                            
                            <input type="hidden" name="quantite" value="<?php echo($nb_billets)?>">
                            <button class="btn btn-success px-5" type="submit">&nbsp Payer &nbsp</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>