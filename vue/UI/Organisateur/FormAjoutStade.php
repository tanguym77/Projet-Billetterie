<body>
    <h2 class="text-center py-3">Création de Stades</h2>
    <div class="row m-0 justify-content-center p-md-5">

        <div class="col-md-8 col-12 border rounded p-md-5">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informations</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Zones</button>
            </div>
            </nav>

            <form id="myForm" action="index.php?ctl=Organisateur&action=AjouterStade" method="POST">
                <input type="hidden" id="inputCount" name="inputCount" value="0"> <!-- Champ pour stocker le nombre d'inputs -->

                <div class="tab-content" id="nav-tabContent">
                    <!-- Info générales -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="text-center row m-0 py-3">
                            <label class="col-6" for="nom_stade">Nom du stade</label>
                            <input class="col-6" id="nom_stade" name="nom_stade" type="text" placeholder="Saisir un nom">
                        </div>
                        <div class="text-center row m-0 py-3">
                            <label class="col-6" for="capacite">Capacité du stade</label>
                            <input class="col-6" id="capacite" name="capacite" type="number" placeholder="Saisir une capacité">
                        </div>  
                    </div>
                    <!-- Infos catégories -->
                    <div class="tab-pane fade text-center" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <button type="button" id="btnAjouterInput" class="btn btn-primary my-3">Ajouter une catégorie</button>

                        <div id="categoriesInputs">
                            <!-- Les inputs générés seront ajoutés ici -->
                        </div>
                    </div>

                    <div class="text-center row m-0 py-3">
                        <input class="col-12" type="submit">
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const btnAjouterInput = document.getElementById('btnAjouterInput');
    const categoriesInputs = document.getElementById('categoriesInputs');
    const inputCountField = document.getElementById('inputCount');
    const categoriesList = []; // Liste pour stocker les catégories

    let counter = 0; // Compteur pour les noms des champs

    btnAjouterInput.addEventListener('click', function() {
        counter++;

        const newInput = document.createElement('input');
        newInput.className = 'col-5';
        newInput.setAttribute('name', 'categorie_' + counter);
        newInput.setAttribute('type', 'number');
        newInput.setAttribute('placeholder', 'Saisir le nombre de places');

        const newLabel = document.createElement('label');
        newLabel.className = 'col-3';
        newLabel.setAttribute('for', 'categorie_' + counter);
        newLabel.textContent = 'Catégorie ' + counter;

        const deleteButton = document.createElement('a');
        deleteButton.className = 'col-3 btn btn-danger';
        deleteButton.textContent = 'Supprimer';
        deleteButton.addEventListener('click', function() {
            categoriesInputs.removeChild(inputDiv); // Supprimer la ligne lorsqu'on clique sur le bouton Supprimer
            updateInputCount(); // Mettre à jour le nombre d'inputs lorsqu'une ligne est supprimée
            categoriesList.pop(); // Retirer la dernière catégorie de la liste
            counter-=1;
        });

        const inputDiv = document.createElement('div');
        inputDiv.className = 'row m-0 justify-content-evenly my-2';
        inputDiv.appendChild(newLabel);
        inputDiv.appendChild(newInput);
        inputDiv.appendChild(deleteButton);

        categoriesInputs.appendChild(inputDiv);
        categoriesList.push({ name: 'categorie_' + counter, value: newInput.value }); // Ajouter la catégorie à la liste

        updateInputCount(); // Mettre à jour le nombre d'inputs lorsqu'une nouvelle ligne est ajoutée
    });

    function updateInputCount() {
        inputCountField.value = categoriesList.length; // Mettre à jour la valeur du champ inputCount avec la taille de la liste
    }
});
</script>

</body>