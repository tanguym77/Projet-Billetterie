<?php include './vue/UI/Utilisateur/Header.php'; ?>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        /* Personnalisation du Slider */
        .custom-div {
            /* border: 2px solid #000;  cadre de 2px de largeur solide noir */
            background-color: rgba(152, 206, 214, 0.3); /* fond transparent (blanc avec 50% d'opacité) */
            padding: 20px; /* espace intérieur de la div */
            border-radius: 10px; /* arrondi des bords de la div */
        }
        .slider-personnalise {
            max-width: 64%; /* Ajustez cette valeur selon vos besoins */
            margin: auto; /* Centrer le slider */
            overflow: hidden; /* Assurez-vous que rien ne dépasse du slider */
            background-color: grey;
        }
        
        /* Définir la hauteur du slider */
        .carousel-inner, .carousel-item, img {
            height: 70vh; /* 50% de la hauteur de la fenêtre */
            object-fit: cover; /* Assure que les images couvrent le slider sans être déformées */
        }
        .carousel,.carousel-inner,.carousel-item,.carousel-item img {
            margin: 0;
            padding: 0;
            border: none;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour la légende */
            color: white; /* Couleur du texte */
        }

        .carousel-item {
            transition: transform 0.3s ease-in-out; /* Ajustez la durée et le type de transition selon les besoins */
        }
    </style>
</head>
    <!-- CONTENU PAGE -->

    <br><br>
    <center><h1> Bienvenue dans la Billetterie Asian Cup Qatar 2023 </h1></center>

    <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="custom-div">
          Pour votre Séjour à Doha, nous vous proposons divers activités à faire :
        </div>
      </div>
    </div>
    </div>

    <br><br><br>
	<div class="slider-personnalise">
        <div id="monSlider" class="carousel slide" data-ride="carousel">
            <!-- Indicateurs -->
            <ol class="carousel-indicators">
                <li data-target="#monSlider" data-slide-to="0" class="active"></li>
                <li data-target="#monSlider" data-slide-to="1"></li>
                <li data-target="#monSlider" data-slide-to="2"></li>
                <li data-target="#monSlider" data-slide-to="3"></li>
                <li data-target="#monSlider" data-slide-to="4"></li>
                <li data-target="#monSlider" data-slide-to="5"></li>
                <li data-target="#monSlider" data-slide-to="6"></li>
                <li data-target="#monSlider" data-slide-to="7"></li>
                <li data-target="#monSlider" data-slide-to="8"></li>
                <li data-target="#monSlider" data-slide-to="9"></li>
            </ol>
			<!-- Wrapper pour les slides -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="vue/image/art-islamique.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 1</h5>
						<p>Description de l'image 1.</p>
					</div>
				</div>

				<div class="carousel-item">
					<img src="vue/image/aspire-park.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 2</h5>
						<p>Description de l'image 2.</p>
					</div>
				</div>

				<div class="carousel-item">
					<img src="vue/image/Aspire-Zone.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 3</h5>
						<p>Description de l'image 3.</p>
					</div>
				</div>
                
                <div class="carousel-item">
					<img src="vue/image/Corniche-Doha.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 4</h5>
						<p>Description de l'image 4.</p>
					</div>
				</div>
                
                <div class="carousel-item">
					<img src="vue/image/Cultural-Village.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 5</h5>
						<p>Description de l'image 5.</p>
					</div>
				</div>
                <div class="carousel-item">
					<img src="vue/image/fort-zubarah.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 6</h5>
						<p>Description de l'image 6.</p>
					</div>
				</div>
                
                <div class="carousel-item">
					<img src="vue/image/Jazeera-Park.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 7</h5>
						<p>Description de l'image 7.</p>
					</div>
				</div>
                <div class="carousel-item">
					<img src="vue/image/MIA-Park.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 8</h5>
						<p>Description de l'image 8.</p>
					</div>
				</div>
                
                <div class="carousel-item">
					<img src="vue/image/Pearl-Qatar.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 9</h5>
						<p>Description de l'image 9.</p>
					</div>
				</div>

                <div class="carousel-item">
					<img src="vue/image/Souq-Waqif.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Titre 10</h5>
						<p>Description de l'image 10.</p>
					</div>
				</div>
                
			</div>

			<!-- Contrôles Précédent/Suivant -->
			<a class="carousel-control-prev" href="#monSlider" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>

			</a>
			<a class="carousel-control-next" href="#monSlider" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>

			</a>
		</div>
	</div>
	
	

	<!-- Liens JavaScript de Bootstrap et jQuery (nécessaire pour les composants Bootstrap, par exemple le slider) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <?php // include './vue/Footer.php'; ?>
</body>
</html>