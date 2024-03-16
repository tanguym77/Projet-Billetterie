<style>
    .equipe-img {
        max-width: 100px;
        max-height: 100px;
        margin-right: 10px;
    }
</style>

<section>
    <!-- INFO GENERALES -->
    <div class="row m-0 p-5">
            <div class="col-4 p-2 text-center">
                <?php echo'<img class="equipe-img" src="uploads/equipes/'.$result[0]['nom_equipe'].'.png" alt="Équipe B">' ?>
            </div>
            <div class="col-4 text-center mt-2">
                <?php echo'<h2>'.$result[0]['nom_match'].'</h2>' ?>
                <i class="bi bi-calendar-check"></i> <?php echo($result[1]['date_match']);?>
            </div>
            <div class="col-4 p-2 text-center">
            <?php echo'<img class="equipe-img" src="uploads/equipes/'.$result[1]['nom_equipe'].'.png" alt="Équipe B">' ?>
            </div>
    </div>

    <!-- INFO A PROPOS & CHIFFRES -->
    <div class="row m-0 p-5">
        <div class="col-md-6">
            <h3>A Propos de l'événement</h3>
            <p>
            Réservez vos billets dès maintenant pour le match <?php echo($result[1]['nom_match']);?> au <?php echo($result[1]['nom_stade']);?>, où ils participeront le <?php echo($result[1]['date_match']);?>. Sécurisez votre place en sélectionnant votre catégorie de billet préférée et en complétant le processus de commande via notre système de réservation online sûr et convivial.
            </p>
            <p>
            Rejoignez d'autres fans pour cette expérience palpitante et faites partie de l'action ! Le processus de réservation simple et sécurisé de La plateforme vous permet de gagner du temps et de vous concentrer sur la préparation du match. Une fois que vous avez réservé vos billets, ils seront facilement envoyés à votre adresse e-mail, garantissant une expérience sans tracas.
            </p>
            <p>
            Si vous ne pouvez pas assister au match, vous pouvez également vendre vos billets à un autre fan enthousiaste. Remplissez simplement le formulaire « Demande de vente de billets » pour trouver un acheteur. Ne manquez pas cet événement incroyable ! Le processus vous permet de gagner du temps et de vous concentrer sur la préparation du match. Une fois que vous avez réservé vos billets, ils seront facilement envoyés à votre adresse e-mail, garantissant une expérience sans tracas.
            </p>
        </div>
        <div class="col-md-6">
            <div class="row">
                <!-- Récupération des datas -->
                <div class="col-md-4 text-center">
                    <i class="bi bi-people fs-1 bg-info rounded p-2"></i>
                    <br><br>
                    <p><b>28</b></p>
                    <p>Personnes recherchent actuellement des billets pour ce match</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-receipt fs-1 bg-info rounded p-2"></i>
                    <br><br>
                    <p><b><?php echo($billets_dispo[0]);?></b></p>
                    <p>Billets restants pour ce match</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-cart3 fs-1 bg-info rounded p-2"></i>
                    <br><br>
                    <p><b><?php echo($billets_reserve[0]);?></b></p>
                    <p>Billets déjà vendus sur ce match</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <i class="bi bi-geo-alt fs-3"></i>
                    <b>
                        <?php echo($result[1]['nom_stade']);?> <br>
                        <?php echo($result[1]['capacite']);?> Places
                    </b>
                </div>
            </div>
        </div>
    </div>

    <!-- PHOTO TERRAIN + RESERVER -->
    <div class="row m-0 justify-content-around">
        <div class="col-md-3 text-center my-auto">
            <img class="img-fluid" src="./uploads/stades/Lusail.png" alt="stade">
        </div>

        <!-- CATEGORIES -->
        <div class="col-md-7 m-1 text-center">

            <?php

            for ($i=0; $i < count($info_zone); $i++) { 
            echo'
            
            <form action="" method="post">
                <div class="row border p-1 m-2">
                    <div class="col-md-2 py-md-5">
                        Catégorie
                        <b>'.$info_zone[$i]['libelle_zone'].'</b>
                    </div>
                    <div class="col-md-3 py-md-5 py-2">
                        Disponible <br>
                        '.DbUtilisateur::dispo_zone($info_zone[$i]['id_zone'], $_GET['evenement'])['Categorie_dispo'].' Billets
                    </div>
                    <div class="col-md-3 py-md-5 py-2">
                        Prix/billet <br>
                        '.$prix_zone[$i]['prix'].' €
                    </div>
                    <div class="col-md-2 py-md-5 py-2">
                        Quantité
                        <input type="number" id="quantity" name="quantity" min="1" max="15">
                    </div>
                    <div class="col-md-2 py-md-5 py-2">
                        Réserver
                        <button class="btn btn-primary" type="submit">Réserver</button>
                    </div>
                </div>
            </form>';
            }
            ?>
        </div>
    </div>

    <!-- Info -->

    <div class="row m-0 my-5 px-5">
    <hr>

        <div class="col-md-4 text-center">
            <div class="row m-0 justify-content-center">
                <div class="col-md-2 border rounded fs-1 my-auto p-0">
                    <i class="bi bi-truck"></i>
                </div>
                <div class="col-md-8">
                    <h3>Livraison sécurisée à temps</h3>
                    <p>Tous les billets sont garantis pour être livrés à temps afin que vous ne manquiez pas les événements!</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="row m-0 justify-content-center">
                <div class="col-md-2 border rounded fs-1 my-auto p-0">
                    <i class="bi bi-safe"></i>
                </div>
                <div class="col-md-8">
                    <h3>Garantie de billets à 100%</h3>
                    <p>Tous les billets sont garantis pour être livrés à temps afin que vous ne manquiez pas les événements!</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="row m-0 justify-content-center">
                <div class="col-md-2 border rounded fs-1 my-auto p-0">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <div class="col-md-8">
                    <h3>Paiement sécurisé SSL</h3>
                    <p>Nous utilisons des niveaux élevés de cryptage des données ici et ne partageons pas vos données avec des fournisseurs tiers!</p>
                </div>
            </div>
        </div>
    <hr>
    </div>

    <!-- INFO IMPORTANTE -->
    <div class="row m-0 p-5 justify-content-center">
        <div class="col-md-10">
            <h3>Informations importantes que vous devez lire et accepter avant d'acheter des Jordan vs Qatar Billets chez nous :</h3>
            <br>
            <li>La date et l'heure du match peuvent être modifiées. Ils sont susceptibles d'être modifiés par l'organisateur officiel, et ne relèvent donc pas de la responsabilité de La plateforme. Nous vous conseillons et vous recommandons de vérifier régulièrement la date et l'heure du match afin de pouvoir préparer vos plans de voyage avec succès. Comme La plateforme n'est pas responsable de la date et de l'heure du match, aucun remboursement ne sera effectué en cas de modification du programme du match. Tout ce dont La plateforme sera responsable est la date et l'heure exactes et définitives du match.</li>
            <li>Veuillez tenir compte du fait que les catégories de sièges de la plateforme ne sont pas les mêmes que celles utilisées par l'organisateur officiel des événements.  Le bloc ou la rangée et le siège exacts ne peuvent pas être confirmés lors de l'achat des billets, mais uniquement la catégorie exacte. La plateforme garantit des places en paires. Si vous avez besoin de plus de 3 sièges ensemble, veuillez nous contacter et nous ferons de notre mieux pour essayer d'organiser cela pour vous.</li>
            <li>La plateforme ne travaille pas avec un organisateur officiel, mais c'est un courtier secondaire qui fournit des billets difficiles à obtenir. Il est important de noter que La plateforme vend la plupart des billets au-dessus de leur valeur nominale et de leur prix officiel, car le prix est déterminé par la demande ou la difficulté de les obtenir, c'est-à-dire l'offre et la demande.</li>
            <li>Veuillez tenir compte du fait que si, pour l'événement déterminé, des billets électroniques ou en papier ne sont pas disponibles, La plateforme se réserve le droit de fournir des cartes de membre, qui ont la même utilisation finale que toute autre forme de billet.</li>
            <li>Les annulations et les modifications sont soumises aux conditions générales de La plateforme.</li>
            <li>La plateforme garantit la livraison de vos billets en toute sécurité et à temps pour le match. La plateforme livrera les billets dès que possible, normalement 3-4 jours avant le match mais occasionnellement 1-3 jours avant le match et parfois, si des retards surviennent, même le jour même du match.</li>
            <li>La plateforme peut vous aider à trouver les meilleurs billets sur le marché pour ce que vous recherchez.</li>
        </div>
    </div>
</section>