<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="container">
    <h1 class="my-4 text-center">Tableau de bord</h1>
</div>

<div class="row justify-content-center m-0 my-5">
    <div class="col-6">
        <canvas id="ChiffreAffaire"></canvas>
    </div>
</div>


<div class="row justify-content-center m-0 my-5">
    <div class="col-6">
        <canvas id="NouveauxClients"></canvas>
    </div>
</div>


<script>
    // Script pour le graphique du Chiffre d'affaire
    document.addEventListener('DOMContentLoaded', function() {
            const ctx1 = document.getElementById('ChiffreAffaire').getContext('2d');

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                    datasets: [{
                        label: 'Chiffre d`affaire (€)',
                        data: [12, 19, 15, 5, 6, 7, 5, 6, 12, 14, 10, 12],
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Script pour le graphique du Nombre de nouveaux clients
            const ctx2 = document.getElementById('NouveauxClients').getContext('2d');

            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                    datasets: [{
                        label: 'Nouveaux clients',
                        data: [50, 60, 45, 55, 70, 65, 80, 75, 90, 85, 100, 95],
                        borderWidth: 1,
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

</script>




