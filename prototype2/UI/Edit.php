<?php


if (file_exists('./Managers/GestionStagiaire.php')) {
	include './Managers/GestionStagiaire.php';
} elseif (file_exists('../managers/GestionStagiaire.php')) {
	include '../Managers/GestionStagiaire.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: GestionStagiaire.php not found in either directory.";
}

$gestionStagiaire = new GestionStagiaire();

if(isset($_GET['Id'])){
   $Stagiair = $gestionStagiaire->GetStagiaireParId($_GET['Id']);
}

if(isset($_POST['Edit'])){
    $Id = $_POST['Id'];
    $Nom = $_POST['Nom'];
    $CNE = $_POST['CNE'];
    $gestionStagiaire->Edit($Id, $Nom, $CNE);
    header('Location: ../index.php');
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
   
    <title>Modifier : </title>
</head>
<body>

<h1 class="text-center">Edit les infos du stagiaires : <?= $Stagiair->GetNom() ?></h1>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="Id" name="Id"   
        value=<?php echo $Stagiair->getId()?> >

    <div class="input-group mb-3">
        <label for="Nom">Nom</label>
        <input type="text" required="required" class="form-control"
        id="Nom" name="Nom"  placeholder="Nom" value=<?php echo $Stagiair->GetNom()?> >
    </div>
  
    <div class="input-group mb-3">
        <label for="CNE">CNE</label>
        <input type="text" required="required" class="form-control" 
        id="CNE"  name="CNE" placeholder="CNE"
        value=<?php echo $Stagiair->GetCNE()?>>
    </div>
    <div>
        <input class="btn btn-primary" name="Edit" type="submit" value="Edit">
        <a  class="btn btn-info" href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>