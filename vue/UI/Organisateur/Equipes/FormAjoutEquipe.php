<body>
    <h2 class="text-center py-3">Ajouter une équipe</h2>
    <div class="row m-0 justify-content-center p-5">
        <div class="col-md-6 border rounded p-5">
            <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour </a>

            <form action="index.php?ctl=Organisateur&action=AjouterEquipe" method="POST" enctype="multipart/form-data">
            
                <!-- IMAGE -->
                <div class="row d-flex justify-content-center">
                    <div class="col-4 mt-1 d-flex justify-content-center">
                        <label for="file-input">
                            <img src="vue/image/user.png" class="rounded-pill img-fluid" id="upfile" style="cursor:pointer;"></img>
                        </label>
                        <input type="file" name="photo_equipe" style="display : none;" id="file-input" onchange="previewPicture(this)"></input>
                    </div>
                </div>
                <h4 class="text-center mt-2">Choisir une image :</h4>

                <!-- NOM EQUIPE -->
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="nom_equipe">Nom de l'équipe</label>
                    <input class="col-6" id="nom_equipe" name="nom_equipe" type="text" placeholder="Exemple: France" required>
                </div>

                <div class="text-center row m-0 py-3">
                    <input class="col-12" type="submit" value="Valider">
                </div>
                
            </form>

        </div>
    </div>

<script>
    let previewPicture  = function (e) {

        // e.files contient un objet FileList
        const [file] = e.files

        // on change l'url de l'image
        document.getElementById("upfile").src = URL.createObjectURL(file)
    }
</script>

</body>