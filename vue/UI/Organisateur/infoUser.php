<div class="btn-retour mt-2">
    <a class="btn btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour </a>
</div>

<h1 class="title-page-formalerte"><i class="fas fa-info-circle"></i> Informations sur le profil</h1>

<div class="card card-alert text-center bg-light">
  <div class=" text-center">
  </div>
  <div class="card-body card-body-alert text-form-alerte">
    <br>
    <h3 class="text-center font-weight-bold">Informations</h3>
    <br>
    <?php
    foreach ($infoUtilisateur as $info) {
    ?>
      <p class="text-detail-modif"><strong><i class="fas fa-user"></i> Nom : </strong><?php echo $info['nom'] ?></p>
      <br>
      <p class="text-detail-modif"><strong><i class="fas fa-user"></i> Prénom : </strong><?php echo $info['prenom'] ?></p>
      <br>
      <p class="text-detail-modif"><strong><i class="fas fa-id-card-alt"></i> Identifiant : </strong><?php echo $info['mail'] ?></p>
      <?php
      if(strlen($info['email']) > 0){
      ?>
        <br>
        <p class="text-detail-modif"><strong><i class="fas fa-at"></i> Email : </strong><?php echo $info['mail'] ?></p>
      <?php
      }
      ?>
      <br>
      <p class="text-detail-modif"><strong><i class="fas fa-user-circle"></i> Statut : </strong><?php 
      switch($info['status']){
        case "1":
            echo "Administrateur";
            break;
        
        case "0":
            echo "Utilisateur";
            break;

      } ?></p>
    <?php
    }
    ?>
<br><br>
