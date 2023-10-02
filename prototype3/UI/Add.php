<?php


if (file_exists('./Managers/GestionStagiaire.php')) {
	include './managers/GestionStagiaire.php';
} elseif (file_exists('../Managers/GestionStagiaire.php')) {
	include '../Managers/GestionStagiaire.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: GestionStagiaire.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 
$gestionStagiaire = new GestionStagiaire();

if (!empty($_POST)) {
    $stagiair = new   Stagiaire();
    $stagiair->SetId($_POST['Id']);
    $stagiair->SetNom($_POST['Nom']);
    $stagiair->SetCNE($_POST['CNE']);
	$stagiair->SetVille($_POST['ville']);
	$gestionStagiaire ->Add($stagiair);

	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./style/style.css">



	<title>Gestion des  Stagiaires</title>



</head>

<body>

	<h1 class="text-center">Ajouter un  Stagiaire</h1>

	<form method="post" action="">
		<div class="input-group mb-3">
			<label for="Nom">Nom</label>
			<input type="text" required="required" class="form-control" id="Nom" name="Nom" placeholder="Nom">
		</div>
		<div class="input-group mb-3">
			<label for="CNE">CNE</label>
			<input type="text" required="required" class="form-control" id="CNE" name="CNE" placeholder="CNE">
		</div>

		<div class="input-group mb-3">
			<label for="Ville">Ville</label>
			<input type="text" required="required" class="form-control" id="Ville" name="Ville" placeholder="Ville">
		</div>
		<div>
			<button class="btn btn-primary" type="submit" >Add</button>
			<a class="btn btn-info" href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>