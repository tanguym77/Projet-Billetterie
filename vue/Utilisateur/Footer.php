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
  
  <div class="row m-0">
    <hr>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <img src="vue/image/ballon-de-football.png"  alt="Logo" height="30">
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">©2024 Billeterie Asian Cup Qatar</span>
      </div>

      <div class="col-md-4 justify-content-center d-flex align-items-center">
        <a href="uploads/Mentions-Legales.pdf" target="_blank" class="mb-3 me-2 mb-md-0 text-body-secondary text-center lh-1">Mentions Légales</a>
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x fs-3"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-instagram fs-3"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook fs-3"></i></a></li>
      </ul>
    </footer>
  </div>
</footer>
  

<!-- Fin Footer -->
</body>
</html>

