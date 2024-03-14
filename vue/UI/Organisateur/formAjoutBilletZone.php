<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un billet de match de football</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn-retour {
            text-align: center;
        }
        .btn-retour a {
            text-decoration: none;
            color: #fff;
            background-color: #6c757d;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-retour a:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="btn-retour mt-2">
        <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour </a>
    </div>
    <br>
<span>
    
    <h2>Créer un billet de match de football</h2>
</span>

<br><br>

    <form action="./index.php?ctl=Organisateur&action=ajout_billet" method="post">

        <!-- PRIX -->
        <label for="prix">Prix du billet : <i class="fas fa-euro-sign"></i></label>
        <input type="number" id="prix" name="prix" min="0" required placeholder="Prix">

        <!-- NB BILLETS -->
        <label for="nb_billets">Nombre de billets : <i class="fas fa-layer-group"></i></label>
        <input type="number" id="nb_billets" name="nb_billets" min="0" required placeholder="Nombre de billets">

        <!-- Zone -->
        <label for="id_zone">Zone : </label>
        <select name="id_zone" id="id_zone">
            <option value="">--Choisir une zone--</option>
            <?php
                for ($i=0; $i < count($result); $i++) { 
                    echo '<option value='.$result[$i]['id_zone'].'>'.$result[$i]['libelle_zone'].'</option>';
                }
            ?>
        </select>
        <br><br>

        <input type="hidden" name="id_evenement" value="<?php echo($_POST['id_evenement']) ?>">
        <input type="submit" value="Créer les billets">
    </form>
    
</body>
</html>
