<!-- Footer -->
<footer class="text-center pt-5">

  <!-- INSCRIPTION -->
  <?php if (!isset($_SESSION['prenom'])) 
  {echo('
    <hr>
    <div class="row m-0">
      <p class="d-flex justify-content-center align-items-center">
        <span class="me-3">Inscription gratuite!</span>
        <a class="btn btn-info" href="index.php?ctl=Connexion&action=FormRegister">Inscription</a>
      </p>
    </div>'
    );} 
  ?>

  <!-- C & Réseaux -->
  
    <hr>
  <div class="row m-0 justify-content-between py-3">

    <div class="col-md-4 py-3 justify-content-start my-auto">
      <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <img src="vue/image/ballon-de-football.png"  alt="Logo" height="30">
      </a>
      <span class="mb-3 mb-md-0 text-body-secondary">©2024 Billeterie Asian Cup Qatar</span>
    </div>

    <div class="col-md-4 py-3 justify-content-center my-auto">
      <a href="uploads/Mentions-Legales.pdf" target="_blank" class="mb-3 me-2 mb-md-0 text-body-secondary text-center lh-1">Mentions Légales</a>
    </div>

    <div class="col-md-4 py-3 justify-content-end text-center">
      <a class="text-body-secondary px-2" href="https://twitter.com/fortnitegame/"><i class="bi bi-twitter-x fs-3"></i></a>
      <a class="text-body-secondary px-2" href="https://www.instagram.com/OGTrumpQueen/"><i class="bi bi-instagram fs-3"></i></a>
      <a class="text-body-secondary px-2" href="https://fr-fr.facebook.com/Otterlifes/"><i class="bi bi-facebook fs-3"></i></a>
  </div>
  </div>
</footer>
  

<!-- Fin Footer -->
</body>
</html>

