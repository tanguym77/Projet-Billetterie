<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!-- Bouton de retour -->
    <div class="btn-retour mt-2">
        <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour</a>
    </div>

    <br><br>

    <center><h1 class="title-page-allalerte"><i class="fas fa-exclamation-circle"></i>Utilisateurs</h1></center>
    <br><br>
    

    <br>
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Données des utilisateurs (exemple)
                        $listeUtilisateurs = array(
                            array("nom" => "Pignon", "prenom"=> "Louis", "email" => "1@1.fr", "status" => "Utilisateur"),
                            array("nom" => "Hales", "prenom"=> "Mathieu", "email" => "2@2.fr", "status" => "Administrateur"),
                        );

                        // Affichage de la liste des utilisateurs sous forme de tableau
                        if (!empty($listeUtilisateurs)) {
                            foreach ($listeUtilisateurs as $utilisateur) {
                                echo "<tr>";
                                echo "<td>" . $utilisateur['nom'] . "</td>";
                                echo "<td>" . $utilisateur['prenom'] . "</td>";
                                echo "<td>" . $utilisateur['email'] . "</td>";
                                echo "<td>" . $utilisateur['status'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>Aucun utilisateur trouvé.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
