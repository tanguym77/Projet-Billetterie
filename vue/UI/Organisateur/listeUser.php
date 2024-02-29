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
        <center>
<form action="index.php?controleur=utilisateur&action=searchUtilisateur" method="post" class="barre-recherche" style="max-width: 400px;">
  <div class="input-group md-form form-sm form-1 pl-0">
    <input class="form-control my-0 py-1 font-italic bar" type="text" name="search" id="search" placeholder="Rechercher un utilisateur...">
    <div class="input-group-append">
      <button type="submit" class="input-group-text bg-dark text-white font-weight-bold text-center search" id="basic-text1"><i class="fas fa-search text-white"
          aria-hidden="true"></i></button></span>
    </div>
  </div>
</form>
</center>

<br>
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Données des utilisateurs (exemple)
                        $listeUtilisateurs = array(
                            array("nom" => "Pignon", "email" => "1@1.fr"),
                            array("nom" => "Hale", "email" => "2@2.fr"),
                        );

                        // Affichage de la liste des utilisateurs sous forme de tableau
                        if (!empty($listeUtilisateurs)) {
                            foreach ($listeUtilisateurs as $utilisateur) {
                                echo "<tr>";
                                echo "<td>" . $utilisateur['nom'] . "</td>";
                                echo "<td>" . $utilisateur['email'] . "</td>";
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
