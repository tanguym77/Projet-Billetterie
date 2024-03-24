<style>
    #btn-back-to-top{
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
    }
</style>

<!-- Scroll to top button -->
<button type="button" class="btn btn-secondary rounded" id="btn-back-to-top" style="z-index: 10;">
    <i class="bi bi-arrow-up-circle" style="height: 20px; width: 20px;"></i>
</button>

<!-- Titre main -->
<section class="row m-0 justify-content-center bg-accueil" style="height:95vh;">
    <div class="col-12 col-md-6 my-auto text-center">
        <h1 class="mb-3">Billeterie Asian cup Qatar 2024</h1>
        <h4 class="mb-3"><em>La référence pour la gestion de vos billets</em></h4>
        <a class="btn btn-primary btn-xl" href="index.php?ctl=Utilisateur&action=ListMatch">Un p'tit match ?</a>
    </div>
</section>

<!-- A propos -->
<section class="content-section bg-light py-5" id="about">
    <div class="container px-4 px-lg-5 text-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-10">
                <h2>Qu'est-ce que l'Asian Cup Qatar ?</h2>
                <p class="lead mb-5">
                    <br>
                L'Asian Cup Qatar est un tournoi de football organisé par la Confédération asiatique de football. 
            Le tournoi mettra en vedette 24 équipes qui disputeront 51 matchs. La phase de groupes comprenant trois matchs en une journée, rendra l’atmosphère de compétition passionnante tout au long du mois. 
            Doha, la capitale du Qatar, est une ville dynamique qui offre une variété d'activités et de sites à explorer. Vous retrouverez plus bas dix choses incontournables à faire ou à visiter à Doha.
                    
                </p>
                <a class="btn btn-dark btn-xl" href="https://www.the-afc.com/en/national/afc_asian_cup/home.html" target="_blank">Pour plus d'infos...</a>
            </div>
        </div>
    </div>
</section>

<!-- Video -->
<section class="text-center">
    <video style="width: 98vw;" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="vue/video/Doha_drone.mp4" type="video/mp4">
    </video>
</section>

<!-- Services-->
<section class="content-section text-center py-5" id="services">
    <div class="container">
        <div class="content-section-heading">
            <h2 class="text-secondary mb-0"><u>Nos Services</u></h2>
            <br>
            <h4 class="mb-5">Vous n'avez pas confiance ? Regardez ca !</h4>
            <br>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 shadow rounded py-2 m-5">
                <span class="rounded-circle mx-auto mb-3"><i class="bi bi-safe fs-3"></i></span>
                <h4><strong>Garantie de billets à 100%</strong></h4>
                <br>
                <p>Tous les billets sont garantis pour être livrés à temps afin que vous ne manquiez pas les événements !</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 shadow rounded py-2 m-5">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-truck fs-3"></i></span>
                <h4><strong>Livraison sécurisée à temps</strong></h4>
                <br>
                <p>Tous les billets sont garantis pour être livrés à temps afin que vous ne manquiez pas les événements!</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 shadow rounded py-2 m-5">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-shield-lock fs-3"></i></span>
                <h4><strong>Paiement sécurisé SSL</strong></h4>
                <br>
                <p>
                Nous utilisons des niveaux élevés de cryptage des données ici et ne partageons pas vos données avec des fournisseurs tiers !
                </p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 shadow rounded py-2 m-5">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-question-circle fs-3"></i></span>
                <h4><strong>Des questions ?</strong></h4>
                <br>
                <p>Nous nous ferons un plaisir de répondre au plus vite à toutes vos intérrogations
                    <br><br><a class="btn btn-outline-info" href="mailto:pablo@maviefootball<3.lol?subject=Questions&body=Ecrivez ici si vous avez des questions" title="" >- adresse de contact -</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Callout-->
<section class="row m-0 justify-content-center image-callout py-5">
    <div class="col-12 col-md-6 my-auto text-center">
        <h3 class="text-white">Profitez d'offres exceptionnelles !</h3>
        <a class="btn btn-success" href="index.php?ctl=Utilisateur&action=ListMatch">Achetez vos billets maintenant</a>
    </div>
</section>

<!-- Les lieux à visiter -->
<section class="row m-0 justify-content-center py-5">
    
    <div class="col-12 col-md-6 text-center my-auto">
        <h2>Besoins d'idées ?</h2>
        <p><i>Nous avons pensé à tout !</i></p>
        <br>
        <p class="mb-5">
            Pour votre séjour à Doha, nous avons sélectionné les 10 lieux incontournables à visiter, mêlant histoire, culture et divertissement. Explorez le Musée d'Art Islamique et son architecture impressionnante, flânez le long de la Corniche pour profiter de la vue sur la skyline, et plongez dans l'atmosphère animée du Souq Waqif pour découvrir l'artisanat local et les saveurs authentiques. Enrichissez votre voyage en explorant les joyaux culturels et naturels de cette ville dynamique du Qatar.
</p>
    </div>

    <!-- Carousel -->
    <div class="col-12 col-md-6 text-center my-auto">
        <div id="LesLieuxAVisiter" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="8" aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide-to="9" aria-label="Slide 10"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="">
                        <img src="vue/image/art-islamique.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Musée d'art islamique</h5>
                            <p>Ce musée emblématique abrite une vaste collection d'art islamique provenant de différentes périodes et régions du monde musulman. L'architecture du musée elle-même est également impressionnante.</p>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/aspire-park.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Aspire Park</h5>
                            <p>L'un des plus grands parcs du Qatar, Aspire Park offre une escapade verte avec des sentiers, des aires de jeux et une vue imprenable sur le complexe sportif Aspire Zone.</p>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/Aspire-Zone.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Aspire Zone</h5>
                            <p>Un complexe sportif qui abrite le stade Khalifa, l'un des stades de la Coupe du Monde de la FIFA 2022. Vous pouvez également trouver des installations sportives de classe mondiale.</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/Corniche-Doha.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Corniche de Doha</h5>
                            <p>Profitez d'une promenade le long de la corniche, offrant une vue spectaculaire sur la ligne d'horizon de Doha. Vous trouverez des espaces de détente, des parcs et des lieux pour se restaurer.</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/Cultural-Village.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Katara Cultural Village</h5>
                            <p>Un complexe culturel qui propose des expositions artistiques, des événements culturels, des restaurants, et des plages artificielles. C'est un excellent endroit pour explorer la diversité culturelle du Qatar.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/fort-zubarah.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-blockm mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Al Zubarah Fort</h5>
                            <p>Situé à environ 100 km au nord-ouest de Doha, ce fort historique est classé au patrimoine mondial de l'UNESCO. Il offre un aperçu fascinant de l'histoire de la région et de son patrimoine architectural.</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/Jazeera-Park.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Al Jazeera Park</h5>
                            <p>Un parc populaire pour les familles avec des aires de jeux, des espaces de pique-nique, et une grande roue qui offre une vue panoramique sur la ville. </p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/MIA-Park.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>MIA Park</h5>
                            <p>Adjacent au musée d'art islamique, ce parc offre des espaces verts, des sculptures contemporaines, une vue sur la skyline et constitue un endroit paisible pour se détendre.</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/Pearl-Qatar.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>The Pearl-Qatar</h5>
                            <p>Une île artificielle offrant des boutiques de luxe, des restaurants, des cafés, des plages et une marina. C'est un lieu de vie luxueux et moderne.</p>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="vue/image/Souq-Waqif.webp" class="d-block w-100" style="height: 50vh;">
                        <div class="carousel-caption d-none d-md-block mb-3 py-1 bg-dark rounded" style="opacity:0.8">
                            <h5>Souq Waqif</h5>
                            <p> Explorez ce marché traditionnel où vous pourrez acheter des produits locaux, de l'artisanat, des épices, des tissus et bien plus encore. C'est également un endroit idéal pour découvrir la culture locale.</p>
                        </div>
                    </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#LesLieuxAVisiter" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> 
    </div>
</section>

<section class="row m-0 mx-auto" style="height: 30rem; width:50vw">
        <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Doha,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
</section>


<!-- Script btn back-to-top -->
<script>
    let mybutton = document.getElementById("btn-back-to-top");

    window.onscroll = function () {
    scrollFunction();
    };

    function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>