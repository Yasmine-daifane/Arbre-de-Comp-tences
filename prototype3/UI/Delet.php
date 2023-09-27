<?php
if (file_exists('./Managers/GestionStagiaire.php')) {
	include './Managers/GestionStagiaire.php';
} elseif (file_exists('../Managers/GestionStagiaire.php')) {
	include '../Managers/GestionStagiaire.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: GestionStagiaire.php not found in either directory.";
}

if(isset($_GET['Id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionStagiaire= new GestionStagiaire();
    $Id = $_GET['Id'] ;
    $gestionStagiaire->Delet($Id);
    header('Location: ../index.php');
}
?>