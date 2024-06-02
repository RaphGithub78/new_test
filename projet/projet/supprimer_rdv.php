<?php


require "donne_debut.php";

$conn = connexion_rdv();

$nom = $_POST['texte'];
supprimer_rdv($conn, $nom);
header("Location:rendez_vous.php");

?>