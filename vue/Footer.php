
  <!-- Footer -->
  <footer class="text-center text-white mt-5" style="background-color: #E8724F;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <?php if (!isset($_SESSION['prenom'])) 
        {echo('<section class="">
          <p class="d-flex justify-content-center align-items-center">
          
            <span class="me-3">Inscription gratuite!</span>
            <a class="btn btn-info" href="index.php?ctl=Connexion&action=FormRegister">Inscription</a>
          </p>
        </section>');} 
        ?>
      
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright
      <!-- 
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    -->
    <!-- Copyright -->
  </footer>
  

<!-- End of .container -->
</body>
</html>