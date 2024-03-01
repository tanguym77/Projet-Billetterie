<?php include './vue/UI/Utilisateur/Header.php'; ?>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>

    body {
        overflow: auto;
        background: linear-gradient(315deg, rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%, rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%);
        animation: gradient 15s ease infinite;
        background-size: 400% 400%;
        background-attachment: fixed;
    }

    /* fond animé */
    @keyframes gradient {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    .wave {
        background: rgb(255 255 255 / 25%);
        border-radius: 1000% 1000% 0 0;
        position: fixed;
        width: 200%;
        height: 12em;
        animation: wave 10s -3s linear infinite;
        transform: translate3d(0, 0, 0);
        opacity: 0.8;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    .wave:nth-of-type(2) {
        bottom: -1.25em;
        animation: wave 18s linear reverse infinite;
        opacity: 0.8;
    }

    .wave:nth-of-type(3) {
        bottom: -2.5em;
        animation: wave 20s -1s reverse infinite;
        opacity: 0.9;
    }

    
    @keyframes wave {
        2% {
            transform: translateX(1);
        }

        25% {
            transform: translateX(-25%);
        }

        50% {
            transform: translateX(-50%);
        }

        75% {
            transform: translateX(-25%);
        }

        100% {
            transform: translateX(1);
        }
    }
        
        .custom-div {
            /* border: 2px solid #000;  cadre de 2px de largeur solide noir */
            font-family: cursive;
            background-color: rgba(255, 255, 255, 0.4); /* fond transparent (blanc avec 50% d'opacité) */
            padding: 20px; /* espace intérieur de la div */
            border-radius: 10px; /* arrondi des bords de la div */
            width: 575px;
        }

        /* Personnalisation du Slider */
        .slider-personnalise {
            max-width: 64%; /* Ajustez cette valeur selon vos besoins */
            margin: auto; /* Centrer le slider */
            overflow: hidden; /* Assurez-vous que rien ne dépasse du slider */
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

        .police {
            font-family : cursive;
        }

        .cadre-div {
            border: 2px solid #ccc; /* Cadre de 2px avec une couleur grise */
            padding: 20px; /* Espace intérieur de la div */
            border-radius: 10px; /* Arrondi des bords */
            background-color: rgba(255, 255, 255, 0.4);
            
        }
    </style>
</head>
    <!-- CONTENU PAGE -->

    <br><br><br><br>
    <center><h1 class = "police"> Bienvenue dans la Billetterie Asian Cup Qatar 2023 </h1></center>
    <br><br><br><br>

    <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="cadre-div">
          <div class="row">
            <div class="col-md-6">
              <img src="vue/image/coupe.png" class="img-fluid" alt="Votre Image"> <!-- img-fluid rend l'image responsive -->
            </div>
            <div class="col-md-6">
              <div>
                <h2>Qu'est-ce que l'Asian Cup Qatar ?</h2>
                <br>
                <p>L'Asian Cup Qatar est un tournoi de football organisé par la Confédération asiatique de football. 
                    Le tournoi mettra en vedette 24 équipes qui disputeront 51 matchs. La phase de groupes comprenant trois matchs en une journée, rendra l’atmosphère de compétition passionnante tout au long du mois. 
                    Doha, la capitale du Qatar, est une ville dynamique qui offre une variété d'activités et de sites à explorer. Vous retrouverez plus bas dix choses incontournables à faire ou à visiter à Doha.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
   
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
				<div class="carousel-item active" data-bs-interval="15000">
					<img src="vue/image/art-islamique.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Musée d'art islamique</h5>
						<p>Ce musée emblématique abrite une vaste collection d'art islamique provenant de différentes périodes et régions du monde musulman. L'architecture du musée elle-même est également impressionnante.</p>
					</div>
				</div>

				<div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/aspire-park.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Aspire Park</h5>
						<p>L'un des plus grands parcs du Qatar, Aspire Park offre une escapade verte avec des sentiers, des aires de jeux et une vue imprenable sur le complexe sportif Aspire Zone.</p>
					</div>
				</div>

				<div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/Aspire-Zone.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Aspire Zone</h5>
						<p>Un complexe sportif qui abrite le stade Khalifa, l'un des stades de la Coupe du Monde de la FIFA 2022. Vous pouvez également trouver des installations sportives de classe mondiale.</p>
					</div>
				</div>
                
                <div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/Corniche-Doha.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Corniche de Doha</h5>
						<p>Profitez d'une promenade le long de la corniche, offrant une vue spectaculaire sur la ligne d'horizon de Doha. Vous trouverez des espaces de détente, des parcs et des lieux pour se restaurer.</p>
					</div>
				</div>
                
                <div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/Cultural-Village.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Katara Cultural Village</h5>
						<p>Un complexe culturel qui propose des expositions artistiques, des événements culturels, des restaurants, et des plages artificielles. C'est un excellent endroit pour explorer la diversité culturelle du Qatar.</p>
					</div>
				</div>
                <div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/fort-zubarah.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Al Zubarah Fort</h5>
						<p>Situé à environ 100 km au nord-ouest de Doha, ce fort historique est classé au patrimoine mondial de l'UNESCO. Il offre un aperçu fascinant de l'histoire de la région et de son patrimoine architectural.</p>
					</div>
				</div>
                
                <div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/Jazeera-Park.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Al Jazeera Park</h5>
						<p>Un parc populaire pour les familles avec des aires de jeux, des espaces de pique-nique, et une grande roue qui offre une vue panoramique sur la ville. </p>
					</div>
				</div>
                <div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/MIA-Park.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>MIA Park</h5>
						<p>Adjacent au musée d'art islamique, ce parc offre des espaces verts, des sculptures contemporaines, une vue sur la skyline et constitue un endroit paisible pour se détendre.</p>
					</div>
				</div>
                
                <div class="carousel-item" data-bs-interval="15000">
					<img src="vue/image/Pearl-Qatar.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>The Pearl-Qatar</h5>
						<p>Une île artificielle offrant des boutiques de luxe, des restaurants, des cafés, des plages et une marina. C'est un lieu de vie luxueux et moderne.</p>
					</div>
				</div>

                <div class="carousel-item" data-bs-interval="10000">
					<img src="vue/image/Souq-Waqif.webp" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Souq Waqif</h5>
						<p> Explorez ce marché traditionnel où vous pourrez acheter des produits locaux, de l'artisanat, des épices, des tissus et bien plus encore. C'est également un endroit idéal pour découvrir la culture locale.</p>
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
	
    <br><br><br>
	
	<!-- Liens JavaScript de Bootstrap et jQuery (nécessaire pour les composants Bootstrap, par exemple le slider) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <?php  include './vue/Footer.php'; ?>
    <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
    </div>
</body>
</html>