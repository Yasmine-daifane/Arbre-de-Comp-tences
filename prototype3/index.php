<?php
include "./Managers/GestionStagiaire.php";
$gestionStagiaire = new GestionStagiaire();
$stagiairs = $gestionStagiaire->GetAllData();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="xampp\htdocs\Prototypes\prototype3\UI\style\style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Gestion des stagiaires</title>
</head>
<body>
    <div>
        <a class="btn btn-primary" href="./UI/Add.php">Ajouter un Stagiaire</a>
        <table class="table table-light table-striped table-hover">
            <tr>
                <th>Nom</th>
                <th>CNE</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
            <?php
            foreach ( $stagiairs as $stagiair) {
            ?>
                <tr>
                    <td>

                        <?= $stagiair->GetNom() ?>

                    </td>
                    <td>
                        <?= $stagiair->GetCNE() ?>
                    </td>
                    <td>
            <?= $stagiair->GetVilleNom() ?> 
        </td>
                    <td>

                        <a class="btn btn-danger" href="./UI/Edit.php?Id=<?php echo $stagiair->GetId() ?>">Edite</a>
                      <a  class="btn btn-warning" href="./UI/Delet.php?Id=<?php echo $stagiair->GetId() ?>">delet</a>
                       
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

                                         <!-- chart  -->
 <div class="chart-container">
    <div style="width: 50%;">
        <canvas id="chart"></canvas>
    </div>
</div>

    <script>
    // Fetch data from the PHP script
    fetch('chart_data.php')
        .then(response => response.json())
        .then(data => {
            // Extract data for labels and dataset
            const labels = data.map(item => item.VilleNom);
            const datasetData = data.map(item => item.TrainerCount);

            // Create a Chart.js chart
            var chart = new Chart(document.getElementById('chart'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Combien de stagiaires exicte dans cette ville',
                        data: datasetData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
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
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>
</body>

</html>